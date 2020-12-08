<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zabieg extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rezerwacje()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
