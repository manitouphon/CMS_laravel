<?php

namespace App\Models;

use App\Http\Resources\WorkingScheduleResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkingSchedule;

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
        Staff::calculateAvailability($doctor_id);
        $staffWorkhours = new WorkingScheduleResource(WorkingSchedule::findOrFail($doctor_id));
        return ($staffWorkhours->status_day === 1 && $staffWorkhours->status_hour === 1);
    }

    public static function calculateAvailability($doctor_id){
        //DoneTODO: discussion[doctor could only have 1 working schedule ]; @Manitou

       $schedules = WorkingSchedule::where('staff_id',$doctor_id)->first();
       $workingDays = $schedules->working_day;


       $bool_workingDays = [false,false,false,false,false,false,false];
       for($i = 0; $i < strlen($workingDays); $i++){
            if($workingDays[$i] === '1'){
                $bool_workingDays[$i] = true;
            }
            else{
                $bool_workingDays[$i] = false;
            }
       }

        //TODO: Calculate the time and set status_day and status_hour@Manitou
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
            'Sat' => $bool_workingDays[6]
        ];
        $day = $now->isoFormat('ddd');
        foreach ($expected_day as $ddd => $value){
            if($day === $ddd){
                if($value === true){
                    WorkingSchedule::find($schedules->id)->update(['status_day'=>'1']);
                }//If $value === 1
                else{
                    WorkingSchedule::find($schedules->id)->update(['status_day'=>'0']);
                }
            }//If match $ddd from $expected array
        }

        //Calculate: status_hour
        $now->hour = $now->hour+7; //Default it will be UTC which has GTM == + 0; Cambodia has GTM +7
        $start_time = Carbon::parse($schedules->start_time);
        $end_time = Carbon::parse($schedules->end_time);

            //Check if $now is in the range of $start_time && $end_time
        if($now->lessThanOrEqualTo($end_time) && $now->greaterThanOrEqualTo($start_time) ){
            WorkingSchedule::find($schedules->id)->update(['status_hour'=>'1']);

        }




        //PURPOSE::TESTING
        return[
            'sun' => $bool_workingDays[0],
            'mon' => $bool_workingDays[1],
            'tue' => $bool_workingDays[2],
            'wed' => $bool_workingDays[3],
            'thu' => $bool_workingDays[4],
            'fri' => $bool_workingDays[5],
            'sat' => $bool_workingDays[6]
        ];
        //STATUS: Working Fine.


    }
}
