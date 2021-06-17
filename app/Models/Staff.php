<?php

namespace App\Models;

use App\Models\WorkingSchedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    use HasFactory;
    public $table = 'staffs';
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'sex',
        'specialization',
        'qualification',
        'blood_group',
        'phone_number',
        'user_id',
        'address',
        'remark',
        'img_url',
        'role',
    ];

    public static function checkIfDoctorAvialable($doctor_id)
    {
        //Staff::calculateAvailability($doctor_id);
        $staffWorkhours = WorkingSchedule::where("staff_id", $doctor_id)->first();
        if (empty($staffWorkhours)) {
            return false;
        } else {
            return ($staffWorkhours->status_day === 1 && $staffWorkhours->status_hour === 1);
        }

    }
    public static function getDoctorAvialable()
    {
        return Staff::join("working_schedules", "staffs.id", "working_schedules.staff_id")
            ->where("staffs.role", "doctor")
            ->where("status_day", 1)
            ->where("status_hour", 1)
            ->get();
    }

    public static function calculateAvailability($doctor_id)
    {
        //DoneTODO: discussion[doctor could only have 1 working schedule ]; @Manitou
        $working_schedule = WorkingSchedule::where('staff_id', $doctor_id)->first();
        $ws_id = $working_schedule->id;


       $schedules = StaffWorkingSchedule::where('working_schedule_id',$ws_id)->get();
       $working_days = [];
       $start_times = [];
       $end_times= [];
       foreach ($schedules as $key => $value   ){
            array_push($working_days,$value['working_day']);
            array_push($start_times, $value['start_time']);
            array_push($end_times, $value['end_time']);
       }//TODO: Status: Added Staff_working_Schedule, so, also calculate status_day && status_hour from this too


        $wd_final = bindec('0000000');
        foreach ($working_days as $value){
            $wd_final = $wd_final | bindec($value);
        }
        //Bitwise OR all working_days.
        $wd_final = decbin($wd_final);  //Expected 1 or 0 of length 7

<<<<<<< HEAD
        $schedules = WorkingSchedule::where('staff_id', $doctor_id)->first();
        $workingDays = $schedules->working_day;

        $bool_workingDays = [false, false, false, false, false, false, false];
        for ($i = 0; $i < strlen($workingDays); $i++) {
            if ($workingDays[$i] === '1') {
=======


       $bool_workingDays = [false,false,false,false,false,false,false];
       for($i = 0; $i < strlen($wd_final); $i++){
            if($wd_final[$i] === '1'){
>>>>>>> ab023a4bc6a377fb6393b6578b657357cdd28ff8
                $bool_workingDays[$i] = true;
            } else {
                $bool_workingDays[$i] = false;
            }
        }


        //Calculating availability and set it to status_day && status_hour;
        $now = Carbon::now();

        //Calculate: status_day
        $expected_day = [
            'Sun' => $bool_workingDays[0],
            'Mon' => $bool_workingDays[1],
            'Tue' => $bool_workingDays[2],
            'Wed' => $bool_workingDays[3],
            'Thu' => $bool_workingDays[4],
            'Fri' => $bool_workingDays[5],
            'Sat' => $bool_workingDays[6],
        ];
        $day = $now->isoFormat('ddd');
<<<<<<< HEAD
        foreach ($expected_day as $ddd => $value) {
            if ($day === $ddd) {
                if ($value === true) {
                    WorkingSchedule::find($schedules->id)->update(['status_day' => '1']);
                } //If $value === 1
                else {
                    WorkingSchedule::find($schedules->id)->update(['status_day' => '0']);
=======
        foreach ($expected_day as $ddd => $value){
            if($day === $ddd){
                if($value === true){
                    WorkingSchedule::find($working_schedule->id)->update(['status_day'=>'1']);

                }//If $value === 1
                else{
                    WorkingSchedule::find($working_schedule->id)->update(['status_day'=>'0']);
                    return null;
>>>>>>> ab023a4bc6a377fb6393b6578b657357cdd28ff8
                }
            } //If match $ddd from $expected array
        }

        //Calculate: status_hour
<<<<<<< HEAD
        $now->hour = $now->hour + 7; //Default it will be UTC which has GTM == + 0; Cambodia has GTM +7
        $start_time = Carbon::parse($schedules->start_time);
        $end_time = Carbon::parse($schedules->end_time);

        //Check if $now is in the range of $start_time && $end_time
        if ($now->lessThanOrEqualTo($end_time) && $now->greaterThanOrEqualTo($start_time)) {
            WorkingSchedule::find($schedules->id)->update(['status_hour' => '1']);
        } else {
            WorkingSchedule::find($schedules->id)->update(['status_hour' => '0']);
        }
=======
        $key_index = -1;
        $now->hour = $now->hour+7; //Default it will be UTC which has GTM == + 0; Cambodia has GTM +7
        $i =-1;
        foreach ($expected_day as $key => $value){
            if($key === $now->isoFormat('ddd') && $value === true){
                $key_index = $i; //map to the staff_working_days object array.
            }
            $i++;
        }
        switch ($key_index){
            case 0: $key_index = 64; break;
            case 1: $key_index = 32; break;
            case 2: $key_index = 16; break;
            case 3: $key_index = 8; break;
            case 4: $key_index = 4; break;
            case 5: $key_index = 2; break;
            case 6: $key_index = 1; break;
        }

        foreach ($schedules as $key => $value   ) {
            if($value['working_day'] & decbin($key_index) != 0){
                $start_time = $value['start_time'];
                $end_time = $value['end_time'];
            }
        }

        $start_time = Carbon::parse($start_time);
        $end_time = Carbon::parse($end_time);

        $start_time->day = $now->day;
        $end_time->day= $now->day ;
        $start_time->month= $now->month;
        $end_time->month = $now->month;


            //Check if $now is in the range of $start_time && $end_time
        if($now->lessThanOrEqualTo($end_time) && $now->greaterThanOrEqualTo($start_time) ){
            WorkingSchedule::find($working_schedule->id)->update(['status_hour'=>'1']);
            $t = true;
        }
        else{
            WorkingSchedule::find($working_schedule->id)->update(['status_hour'=>'0']);
            $t = false;
        }

        return [$t,$now,$start_time, $end_time];


>>>>>>> ab023a4bc6a377fb6393b6578b657357cdd28ff8

        //PURPOSE::TESTING
        return [
            'sun' => $bool_workingDays[0],
            'mon' => $bool_workingDays[1],
            'tue' => $bool_workingDays[2],
            'wed' => $bool_workingDays[3],
            'thu' => $bool_workingDays[4],
            'fri' => $bool_workingDays[5],
            'sat' => $bool_workingDays[6],
        ];
        //STATUS: Working Fine.

    }
    //TODO: Make func that returns all avaliable doctos @#manitou

}
