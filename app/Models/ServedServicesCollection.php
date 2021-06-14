<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServedServicesCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'served_service_id', 'pat_id', 'total_payment_id',
    ];
}
