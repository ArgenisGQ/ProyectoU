<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critery extends Model
{
    use HasFactory;

    //relacion de uno a muchos inversa

    public function activities(){
        return $this->belongsTo(Activity::class);
    }
}
