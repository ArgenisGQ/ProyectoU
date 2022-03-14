<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    //Relacion Masiva
    protected $fillable = [
        'name',
        'slug',
        'id_sima_faculty',
        'id_continua_faculty',
    ];

    //metodo para mostrar slug y no el id
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos
    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
