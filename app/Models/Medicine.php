<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        "medicine_name", "category", "company", "qty", "buy_price", "sell_price", "status", "description",
    ];
}
