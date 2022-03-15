<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //Relacion de uno a muchos inversa
    /* public function activity(){
        return $this->belongsTo(Activity::class);
    } */
}
