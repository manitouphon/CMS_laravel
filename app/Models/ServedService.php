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
    public function serveServicesCollection()
    {
        return $this->hasOne(ServedServicesCollection::class, 'id','bed_allotment_id');
    }
    public  function  bedAllotments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BedAllotment::class, 'id','bed_allotment_id');
    }
    public function surgeryReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SurgeryReport::class,'id','sugery_report_id');
    }
    public function  birthReports(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BirthReport::class,'id','birth_report_id');
    }

    protected function isOtherService($req): bool
    {
        return $req->other_service_id === 1;
    }
}
