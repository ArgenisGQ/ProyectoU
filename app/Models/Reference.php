<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'autor',
        'year',
        'activity_id'
    ];

    //relacion de uno a muchos inversa

    public function activities(){
        return $this->belongsTo(Activity::class);
    }
}
