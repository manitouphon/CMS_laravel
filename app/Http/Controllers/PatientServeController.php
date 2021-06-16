<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServedServiceResource;
use App\Http\Resources\ServedServicesCollectionResource;
use App\Models\ServedService;
use App\Models\ServedServicesCollection;
use Illuminate\Http\Request;

class PatientServeController extends Controller
{
    public function index()
    {
        return ServedServicesCollectionResource::collection(ServedServicesCollection::all());
    }
    public function show_patient_doctor(){
        return ServedServiceResource::collection(ServedService::where('doc_id',auth()->user()->id)->get());
    }
}
