<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function getPatient(Request $request)
    {
        return response()->json(['data' => Patient::all()]);
    }

    public function findPatient(Request $request, $pat_id)
    {

        if ($request->user()->role === 'admin') {
            return response()->json(['data' => Patient::findOrFail($pat_id)]);
        } else {
            abort(403);
        }

    }

    public function updatePatient(Request $request, $pat_id)
    {
        if ($request->user()->role === 'admin') {
            return response()->json(['data' => Patient::findOrFail($pat_id)->update($request->all())]);
        } else {
            abort(403);
        }

    }

    public function addPatient(PatientRequest $request)
    {
        if ($request->user()->role === 'admin') {
            return response()->json(['message' => "Patient successfully added", 'data' => Patient::create($request->all())]);
        } else {
            abort(403);
        }
    }

    public function deletePatient(Request $request, $pat_id)
    {
        if ($request->user()->role === 'admin') {
            return Patient::findOrFail($pat_id)->delete();
        } else {
            abort(403);
        }
    }
}
