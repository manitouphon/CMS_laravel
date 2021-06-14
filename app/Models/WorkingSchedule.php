<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['working_day', 'start_time', 'end_time', 'status_day', 'status_hour', 'staff_id'];

    public function staffs()
    {
        return $this->hasOne(Staff::class, 'id', 'staff_id')->withDefault();
    }
    public $timestamps = null;
}
