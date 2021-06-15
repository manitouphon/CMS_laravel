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
    public function  servedservices(){
        return $this->belongsTo(ServedService::class,'served_service_id');
    }
    public function  patients(){
        return $this->belongsTo(Patient::class , 'pat_id');
    }
}
