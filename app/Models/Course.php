<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'section',
        'id_sima',
        'id_continua',
        'id_sima_doc',
        'id_continua_doc',
        'id_dpto',
        'id_faculty',
        'slug',
        'color'
    ];

     //metodo para mostrar slug y no el id
     public function getRouteKeyName()
     {
         return "slug";
     }

    //Relacion muchos a muchos

    public function activities(){
        return $this->belongsToMany(Activity::class);
    }
}
