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

    public function activity()
    {
     return $this->belongsToMany(Activity::class);
    }

    public function courses()
    {
     return $this->belongsToMany(User_course::class);
    }
}
