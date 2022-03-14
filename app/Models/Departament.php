<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'section',
        'id_sima',
        'id_continua',
        'id_sima_faculty',
        'id_continua_faculty',
    ];
}
