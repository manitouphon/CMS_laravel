<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathReport extends Model
{
    use HasFactory;
    protected $fillable= [
        'date',
        'cause',
        'des',
        'service_fee',
        'doc_id'
    ];
}
