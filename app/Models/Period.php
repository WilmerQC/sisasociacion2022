<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    //relacion uno a muchos inversa
    public function associate()
    {
        return $this->belongsTo(associate::class);
    }
}
