<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    //Relacion Masiva
    protected $fillable = [
        'name',

    ];

    //Variable para manejo de fechas de inicio y final de actividad
    protected $dates = [
        'start_acad',
        'finish_acad',
        'academic_start',
        'academic_finish',
        ];

    //metodo para mostrar slug y no el id
    /* public function getRouteKeyName()
    {
        return "slug";
    } */

    //Relacion uno a muchos
    /* public function activities(){
        return $this->hasMany(Activity::class);
    } */
}
