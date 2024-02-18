<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sets extends Model
{
    use HasFactory;
    protected $table = 'sets';

    protected $fillable = [
        'workout_id',
        'name',
        'description'
    ];

    public function workout()
    {
        return $this->belongsTo(Workouts::class, 'workout_id');
    }

    public function exercises()
    {
        return $this->hasMany(Exercises::class, 'set_id');
    }

}
