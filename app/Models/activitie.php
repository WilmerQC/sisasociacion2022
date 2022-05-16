<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activitie extends Model
{
    use HasFactory;

    //relacion 1 a muchos
    public function assistance(){
        return $this->hasMany(Assistance::class);
    }

    //relacion 1 a muchos
    public function treasury(){
        return $this->hasMany(Treasury::class);
    }

    //relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
