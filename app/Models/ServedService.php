<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_id', 'patient_id', 'service_id', 'medicine_purchase_id', 'total_payment_id',
    ];

    public function patients()
    {
        return $this->hasOne(Patient::class, 'id', 'patient_id');
    }
    public function doctors()
    {
        return $this->hasOne(Staff::class, 'id', 'doc_id');
    }
    public function services()
    {
        return $this->hasMany(Services::class);
    }
    protected function isOtherService($req): bool
    {
        return $req->other_service_id === 1;
    }
}
