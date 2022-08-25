<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_activity',
        'unit',
        'evaluation',
        'id_course',
        'id_period',
    ];

    //relacion muchos a muchos
    public function activity()
    {
     /* return $this->belongsToMany(Activity::class); */
     return $this->belongsTo(Activity::class, 'id');
    }

    //relacion de uno a muchos
    /* public function activity()
    {
     return $this->belongsTo(Activity::class);
    } */

    public function course()
    {
     /* return $this->belongsToMany(User_course::class, 'id'); */
     return $this->belongsTo(User_course::class, 'id_course');
    }
}
