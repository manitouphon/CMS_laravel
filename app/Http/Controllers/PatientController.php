<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Staff;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getPatient(Request $request){
        return Patient::all();
    }
    public function findPatient(Request $request, $pat_id){
        if(Patient::find($pat_id) === null){
            return Response('Patient not found', 404);
        }
        return Patient::find($pat_id);
    }
    public function updatePatient(Request $request, $pat_id){
        if(Patient::find($pat_id) === null){
            return Response('Patient not found', 404);
        }
        return Patient::find($pat_id)->update($request->all());
    }

    public function deletePatient(Request $request, $pat_id)
    {
        if (Patient::find($pat_id) === null) {
            return Response('Patient not found', 404);
        }
        return Patient::find($pat_id);
    }

}
