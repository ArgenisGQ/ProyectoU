<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relacion Masiva
    protected $fillable = ['name', 'slug'];

    //metodo para mostrar slug y no el id
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
