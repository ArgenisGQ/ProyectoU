<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

     //metodo para mostrar slug y no el id
     public function getRouteKeyName()
     {
         return "slug";
     }

    //Relacion muchos a muchos

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
