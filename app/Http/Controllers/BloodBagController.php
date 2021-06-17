<?php

namespace App\Http\Controllers;

use App\Models\BloodBag;
use App\Models\LogDeletedStaff;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BloodBagController extends Controller
{

    private $bGroups = ['A+','A-','AB+','AB-','B+','B-','O+','O-'];

    //TODO COMPLETED: Add indexing
    public function index(){
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor')){
            $data = BloodBag::all();
            return response()->json(["Message" => $data]);
        }
        else abort(403);
    }

    public function update(Request $request)
    {
        if(Gate::allows('isAdmin') || Gate::allows('isDoctor'))

        foreach ($this->bGroups as $bGroup){
            if($request->blood_group === $bGroup){
                if( Gate::allows('isAdmin', [$request]) ){
//                    var_dump('Okay, Admin');
                    BloodBag::where("blood_group",$bGroup)->update($request->all('qty'));
                    return response()->json(["Message" => "Update Successfully"]);
                }
                else{
                    abort(403);
                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid Blood group query call"],500);
    }


}
