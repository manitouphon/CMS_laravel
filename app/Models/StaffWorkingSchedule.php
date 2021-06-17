<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
=======
<<<<<<< HEAD:app/Models/Services.php
class Services extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','remark','des',
=======
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
class StaffWorkingSchedule extends Model
{
    use HasFactory;
    protected $fillable=[
      'working_day',
      'start_time',
      'end_time',
<<<<<<< HEAD
=======
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4:app/Models/StaffWorkingSchedule.php
>>>>>>> 12c01f7562575392f74adaa844c56f31da2017e4
    ];

}
