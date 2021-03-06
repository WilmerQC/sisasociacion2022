<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assistance extends Model
{
    use HasFactory;

    //relacion 1 a muchos inversa
    public function activitie(){
        return $this->belongsTo(Activitie::class);
    }

    public function associate(){
        return $this->belongsTo(Associate::class);
    }
}
