<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_course extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'section',
        'course',
        'ced',
        'name',
        /* 'ced_user', */
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
