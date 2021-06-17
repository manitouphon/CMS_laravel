<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedAllotment extends Model
{
    use HasFactory;
    protected $fillable = [
        "bed_type",
        "bed_number",
        "allotment_date",
        "allotment_time",
        "is_discharge",
        "discharge_date",
        "discharge_time",
        "served_service_id",
        "patient_id",
        "service_fee",
        "nurse_id",
    ];

    public function patient(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
    public $timestamps=null;
}
