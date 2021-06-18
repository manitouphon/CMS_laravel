<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'remark', 'des',
    ];
    public function servedService()
    {
        return $this->hasOne(ServedService::class, 'service_id', 'id')->withDefault();
    }
}