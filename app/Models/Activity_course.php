<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_activity',
        'id_course',
        'id_period',
    ];
}
