<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkingScheduleRequest;
use App\Http\Resources\WorkingScheduleResource;
use App\Models\Staff;
use App\Models\StaffWorkingSchedule;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkingScheduleRequest $request)
    {
        $staff_id = Staff::where('id',$request->staff_id)->first();
        if($staff_id === null) abort(404);


        $wk_sch = WorkingSchedule::where('staff_id',$staff_id->id)->first();
        $array = array_merge($request->all(),["working_schedule_id" => "$wk_sch->id"]);
        $data = StaffWorkingSchedule::create($array );

        return response()->json(['message' => "Working scedule added", 'data' => $data]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $staff_id)
    {
        $wk_schedule = WorkingSchedule::findOrFail($staff_id)->first();
        $staff_wk_schedule = StaffWorkingSchedule::where('working_schedule_id',$wk_schedule->id)->get;

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
