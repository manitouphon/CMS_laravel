<?php

namespace App\Models;

use App\Http\Resources\WorkingScheduleResource;
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

    public static function checkIfDocterAvialable($docter_id)
    {
        $staffWorkhours = new WorkingScheduleResource(WorkingSchedule::findOrFail($docter_id));
        return ($staffWorkhours->status_day === 1 && $staffWorkhours->status_hour === 1);
    }
}
