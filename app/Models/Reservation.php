<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fryzjer()
    {
        return $this->belongsTo(\App\Models\Fryzjer::class);
    }

    public function zabieg()
    {
        return $this->belongsTo(\App\Models\Zabieg::class);
    }
}
