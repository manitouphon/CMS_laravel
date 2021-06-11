<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'create_date',
        'sex',
        'specialization',
        'qualification',
        'blood_group',
        'phone_number',
        'address',
        'remark',
        'img_url',
        'role',
    ];
}
