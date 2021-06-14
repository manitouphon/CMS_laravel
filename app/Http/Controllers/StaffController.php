<?php

namespace App\Http\Controllers;

use App\Models\LogDeletedStaff;
use App\Models\Staff;
use App\Providers\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{
    private $roles = ['doctor', 'receptionist', 'pharmacist'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        foreach ($this->roles as $role){
            if($request->role === $role){
                if( Gate::allows('isAdmin', [$request]) ){
                    $data = Staff::where('role', $role)->get();
                    return response()->json([$role => $data ]);
                }
                else{
                    return response()->json(["Message" => "Access Forbidden"],403);

                }
            }


        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"],500);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        /* ===Insert Into Serve Service  === */
        foreach ($this->roles as $role){
            if($request->role === $role){
                if( Gate::allows('isAdmin', [$request]) ){
                    Staff::create($request->all());
                }
                else{
                    return response()->json(["Message" => "Access Forbidden"],403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"],500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        foreach ($this->roles as $role){
            if($request->role === $role){
                if( Gate::allows('isAdmin', [$request]) ){
                   Staff::find($id)->update($request->all());
                }
                else{
                    return response()->json(["Message" => "Access Forbidden"],403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"],500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request,$id)
    {
        foreach ($this->roles as $role){
            if($request->role === $role){
                if( Gate::allows('isAdmin', [$request]) ){
                    //Log deleted row
                    $targetStaff = Staff::find($id);
                    if($targetStaff === null){
                        return response()->json(["Message" => "Could not find ".$role." that has id = ".$id],404);
                    }
                    $oldStaff = Staff::find($id)->toArray();
                    LogDeletedStaff::create($oldStaff);
                    Staff::destroy($id);
                    return response()->json(["Message"=>"Successfully deleted ".$role." that has id = ".$id]);
                }
                else{
                    return response()->json(["Message" => "Access Forbidden"],403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"],500);
    }
}
