<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spouse extends Model
{
    use HasFactory;
    //relacion de uno a uno inversa
    public function associate()
    {
        return $this->hasOne(associate::class);
    }
}
