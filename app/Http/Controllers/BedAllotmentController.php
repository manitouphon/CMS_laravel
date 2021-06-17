<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedAllotmentRequest;
use App\Http\Resources\BedAllotmentResource;
use App\Models\BedAllotment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BedAllotmentController extends Controller
{
    //TODO COMPLETED: Permission Doc/Recep/Admin
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor')  || Gate::allows('isReceptionist')  ){
            return BedAllotmentResource::collection(BedAllotment::all());
        }else{
            abort(403);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedAllotmentRequest $request)
    {
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor')  || Gate::allows('isReceptionist')){
            $bed = BedAllotment::create($request->all());

            return response()->json(['message' => "Bed already added", 'data' => $bed]);
        }
        else{
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor')  || Gate::allows('isReceptionist')  ){
            $bed = BedAllotment::findOrFail($id);
            $bed->update($request->all());
            return response(['message' => "Update successfully"]);
        }else{
            abort(403);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor')  || Gate::allows('isReceptionist')  ){
            $bed = BedAllotment::findOrFail($id);
            $bed->delete();
            return response()->json(['message' => "Bed already deleted"]);
        }else{
            abort(403);
        }

    }
}
