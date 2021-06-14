<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_total', 'pay', 'balance',
    ];
}
