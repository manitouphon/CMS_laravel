<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffWorkingSchedule extends Model
{
    use HasFactory;
    protected $fillable=[
        'working_schedule_id',
        'working_day',
        'start_time',
        'end_time',
    ];

}
