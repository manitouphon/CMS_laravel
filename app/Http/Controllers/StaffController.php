<?php

namespace App\Http\Controllers;

use App\Models\LogDeletedStaff;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\ServedService;
use App\Http\Requests\ServePatientRequest;
use App\Models\ServedServicesCollection;

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

        if (empty($request->role)) {
            return response()->json(['data' => Staff::all()]);
        }
        foreach ($this->roles as $role) {
            if ($request->role === $role) {
                if (Gate::allows('isAdmin', [$request])) {
                    $data = Staff::where('role', $role)->get();
                    return response()->json([$role => $data]);
                } else {
                    return response()->json(["Message" => "Access Forbidden"], 403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"], 500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ServePatientRequest $request)
    {
        //Note: Not Creating staff but instead, provides payments process and assign doctor to a patient

        /* =========Check docktor availability============= */
        if (Staff::checkIfDoctorAvialable($request->doc_id)) {
            /* =======Insert Into Serve Service  ======= */
            $serverService = ServedService::create($request->all());
            $serverServiceCollection = ServedServicesCollection::create(array_merge($request->all(), ['served_service_id' => $serverService->id]));
            /* ===========Insert into payment table===================== */
            // TODO is staff also add payment while serve?
            return response()->json(['message' => "Patient has been served successfully", 'data' => $serverServiceCollection]);
        } else {
            return response()->json(['message' => "Doctor is currently busy"], 422);
        };

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
        // ================Update Code Here ====================
        foreach ($this->roles as $role) {
            if ($request->role === $role) {
                if (Gate::allows('isAdmin', [$request])) {
                    Staff::find($id)->update($request->all());
                } else {
                    return response()->json(["Message" => "Access Forbidden"], 403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id)
    {
        foreach ($this->roles as $role) {
            if ($request->role === $role) {
                if (Gate::allows('isAdmin', [$request])) {
                    //Log deleted row
                    $targetStaff = Staff::find($id);
                    if ($targetStaff === null) {
                        return response()->json(["Message" => "Could not find " . $role . " that has id = " . $id], 404);
                    }
                    $oldStaff = Staff::find($id)->toArray();
                    LogDeletedStaff::create($oldStaff);
                    Staff::destroy($id);
                    return response()->json(["Message" => "Successfully deleted " . $role . " that has id = " . $id]);
                } else {
                    return response()->json(["Message" => "Access Forbidden"], 403);

                }
            }
        }
        //If nothing is returned in loop
        return response()->json(["Message" => "Invalid role query call"], 500);
    }
}
