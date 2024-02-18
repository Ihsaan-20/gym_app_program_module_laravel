<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workouts extends Model
{
    use HasFactory;
    protected $table = 'workouts';
    
    protected $fillable = [
        'program_id',
        'name',
        'description'
    ];

    public Function program()
    {
        return $this->belongsTo(Programs::class, 'program_id');
    }

    public function sets()
    {
        return $this->hasMany(Sets::class, 'workout_id');
    }

   

}
