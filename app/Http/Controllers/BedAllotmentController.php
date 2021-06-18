<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedAllotmentRequest;
use App\Http\Resources\BedAllotmentResource;
use App\Models\BedAllotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BedAllotmentController extends Controller
{
    //TODO: Permission Doc/Recep/Admin
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return BedAllotmentResource::collection(BedAllotment::all());
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedAllotmentRequest $request)
    {
        $bed = BedAllotment::create($request->all());

        return response()->json(['message' => "Bed already added", 'data' => $bed]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $bed = BedAllotment::findOrFail($id);
        $bed->update($request->all());

        return response(['message' => "Update successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bed = BedAllotment::findOrFail($id);
        $bed->delete();
        return response()->json(['message' => "Bed already deleted"]);
    }
}
