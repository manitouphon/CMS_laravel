<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'sex',
        'blood_group',
        'phone_number',
        'address',
        'email',
        'img_url',
        'medical_history',
    ];
}
