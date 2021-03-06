<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBag extends Model
{
    use HasFactory;
    protected $fillable =[
      'blood_group',
      'qty',
    ];
}
