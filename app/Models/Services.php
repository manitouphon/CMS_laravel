<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
<<<<<<< HEAD:app/Models/Services.php
=======
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
class Services extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable=[
        'name','remark','des',
=======
class StaffWorkingSchedule extends Model
{
    use HasFactory;
    protected $fillable=[
      'working_day',
      'start_time',
      'end_time',
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4:app/Models/StaffWorkingSchedule.php
    ];

=======
    protected $fillable = [
        'name', 'remark', 'des',
    ];
    public function servedService()
    {
        return $this->hasOne(ServedService::class, 'service_id', 'id')->withDefault();
    }
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
}
