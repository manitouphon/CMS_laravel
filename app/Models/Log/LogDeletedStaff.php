<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogDeletedStaff extends Model
{
    use HasFactory;
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
}
