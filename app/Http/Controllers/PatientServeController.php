<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServedServicesCollectionResource;
use App\Models\ServedServicesCollection;
use Illuminate\Http\Request;

class PatientServeController extends Controller
{
    public function index()
    {
        return response()->json(['data' => ServedServicesCollectionResource::collection(ServedServicesCollection::all())]);
    }
}
