<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\ServedServiceResource;
use App\Http\Resources\ServedServicesCollectionResource;
use App\Models\Patient;
use App\Models\ServedService;
use App\Models\ServedServicesCollection;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(['data' => Patient::all()]);
    }

    public function show(Request $request, $pat_id)
    {

        if ($request->user()->role === 'admin') {
            return response()->json(['data' => Patient::findOrFail($pat_id)]);
        } else {
            abort(403);
        }

    }

    public function update(Request $request, $pat_id)
    {
        if ($request->user()->role === 'admin') {
            return response()->json(['data' => Patient::findOrFail($pat_id)->update($request->all())]);
        } else {
            abort(403);
        }

    }

    public function store(PatientRequest $request)
    {
        if ($request->user()->role === 'admin') {
            return response()->json(['message' => "Patient successfully added", 'data' => Patient::create($request->all())]);
        } else {
            abort(403);
        }
    }

    public function destroy(Request $request, $pat_id)
    {
        if ($request->user()->role === 'admin') {
            return Patient::findOrFail($pat_id)->delete();
        } else {
            abort(403);
        }
    }
}
