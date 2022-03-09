<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //relacion uno a muchos
    public function permissionss(){
        return $this->hasMany('vendor\spatie\laravel-permission\src\Models\Permission');
    }

    //nommbre de la tabla a usar, en ciertos casos se usa esta referencia
    protected $table='categories_permissions';

}
