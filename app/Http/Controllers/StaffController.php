<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServePatientRequest;
use App\Models\ServedService;
use App\Models\ServedServicesCollection;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = ['admin', 'pharmacist', 'receptionist', 'doctor'];

        if (empty($request->role)) {
            return response()->json(['data' => Staff::all()]);
        }

        foreach ($roles as $key => $role) {
            if ($request->role === $role) {
                return response()->json(['data' => Staff::where("role", $role)->get()]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Add patient

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServePatientRequest $request)
    {

        /* =========Check docktor availability============= */
        if (Staff::checkIfDocterAvialable($request->doc_id)) {
            /* =======Insert Into Serve Service  ======= */
            $serverService = ServedService::create($request->all());
            $serverServiceCollection = ServedServicesCollection::create(array_merge($request->all(), ['served_service_id' => $serverService->id]));
            /* ===========Insert into payment table===================== */
            // TODO is staff also add payment while serve?
            return response()->json(['message' => "Patient has been served", 'data' => $serverServiceCollection]);
        } else {
            return response()->json(['message' => "Docter cannot handler work anymore"], 422);
        };

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
        // ================Update Code Here ====================
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
