<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkingScheduleRequest;
use App\Http\Resources\WorkingScheduleResource;
use App\Models\WorkingSchedule;
use Illuminate\Http\Request;

class WorkingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $working = new WorkingSchedule();
        return ['data' => WorkingScheduleResource::collection(WorkingSchedule::all())];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkingScheduleRequest $request)
    {
        $workingScedule = WorkingSchedule::create($request->all());

        return response()->json(['message' => "Working schedule added", 'data' => $workingScedule]);
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
