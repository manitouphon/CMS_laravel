<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServedServiceResource;
use App\Http\Resources\ServiceResource;
use App\Models\ServedService;
use App\Models\Services;
use Illuminate\Http\Request;

class PatientServeController extends Controller
{
    protected $service_role = ['surgery', "birth"];
    public function index()
    {
        return ServedServiceResource::collection(ServedService::all());
    }
    public function index_serve(Request $request)
    {
        foreach ($this->service_role as $service) {
            if ($request->role === $service) {
                return ServiceResource::collection(Services::where("name", $service)->get());
            }
        }
    }
    public function show_patient_doctor()
    {
        return ServedServiceResource::collection(ServedService::where('doc_id', auth()->user()->id)->get());
    }
}
