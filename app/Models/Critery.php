<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critery extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_id',
        'critery',
        'evaluation'
    ];

    //relacion de uno a muchos inversa

    public function activities(){
        return $this->belongsTo(Activity::class);
    }
}
