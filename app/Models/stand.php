<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stand extends Model
{
    use HasFactory;

    public function associate(){
        return $this->belongsTo(Associate::class);
    }
}
