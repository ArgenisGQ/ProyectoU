<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    //Relacion Masiva
    protected $fillable = ['name'];

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
