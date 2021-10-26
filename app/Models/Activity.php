<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    //Relacion Asignacion masiva
    protected $guarded = ['id', 'created_at', 'update_at'];

    //Relacion de uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Faculty::class);
    }

    //Relacion de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Course::class);
    }

    //Relacion uno a uno poliformica
    public function image(){
        return $this->MorphOne(Image::class, 'imageable');
    }
}
