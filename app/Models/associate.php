<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class associate extends Model
{
    use HasFactory;
    //relacion de uno a muchos
    public function sons()
    {
        return $this->hasMany(son::class);
    }

    //relacion de uno a uno
    public function spouse()
    {
        return $this->hasOne(spouse::class);
    }

    //uno a muchos
    public function stand(){
        return $this->hasMany(stand::class);
    }

    //relacion de uno a muchos
    public function assistance()
    {
        return $this->hasMany(Assistance::class);
    }

    //relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
