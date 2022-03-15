<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    //Relacion Asignacion masiva
    protected $guarded = ['id', 'created_at', 'update_at'];

    //Variable para manejo de fechas de inicio y final de actividad
    protected $dates = [
                    'lapse_in',
                    'lapse_out',
                    'academic_start'
                    ];

    //Relacion de uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos inversa
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    //Relacion de muchos a muchos
    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    //Relacion uno a uno poliformica
    public function image(){
        return $this->MorphOne(Image::class, 'imageable');
    }

    /* //Relacion de uno a muchos inversa
    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    } */

}
