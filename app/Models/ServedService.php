<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_fee', 'doc_id', 'bed_allotment_id', 'birth_report_id', 'surgery_report_id', 'medicine_purchase_id', 'other_service_id',
    ];

    protected function isOtherService($req)
    {
        return $req->other_service_id === 1;
    }
}
