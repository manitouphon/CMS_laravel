<?php

namespace App\Models;

use App\Http\Resources\WorkingScheduleResource;
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
        $this->calculateAvailability($doctor_id);
        $staffWorkhours = new WorkingScheduleResource(WorkingSchedule::findOrFail($doctor_id));
        return ($staffWorkhours->status_day === 1 && $staffWorkhours->status_hour === 1);
    }

    public static function calculateAvailability($doctor_id){
        //TODO: discussion[dooctor could only have 1 working schedule ];
       $schedules = WorkingSchedule::where('staff_id',$doctor_id)->first();
    //    $schedules = $schedule 
       $workingDays = $schedules->working_day;
       

       $schDay = [false,false,false,false,false,false,false];
       for($i = 0; $i < strlen($workingDays); $i++){
            if($workingDays[$i] === '1'){
                $schDay[$i] = true;
            }
            else{
                $schDay[$i] = false;
            }
       }

       return[
            'sun' => $schDay[0],
            'mon' => $schDay[1],
            'tue' => $schDay[2],
            'wed' => $schDay[3],
            'thu' => $schDay[4],
            'fri' => $schDay[5],
            'sat' => $schDay[6]
        ];
       //STATUS: Working Fine.

       //TODO: Calculate the time and set status_day and status_hour@Manitou
       


    }
}
