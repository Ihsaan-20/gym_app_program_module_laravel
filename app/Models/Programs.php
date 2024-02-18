<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Programs extends Model
{
    use HasFactory;
    protected $table = 'programs';
    
    protected $fillable = [
        'auth_id',
        'name',
        'coach_id',
        'assigned_clients',
        'description'
    ];

    public Function workouts()
    {
        return $this->hasMany(Workouts::class, 'program_id');
    }
    

}