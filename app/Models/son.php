<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class son extends Model
{
    use HasFactory;
    //relacion uno a muchos inversa
    public function associate()
    {
        return $this->belongsTo(associate::class);
    }
}
