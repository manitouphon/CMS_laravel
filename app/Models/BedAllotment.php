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
        "service_fee",
        "nurse_id",
    ];
}
