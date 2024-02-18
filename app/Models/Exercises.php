<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Exercises extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'set_id',
        'name',
        'description'
    ];

    protected Function set()
    {
        return $this->belongsTo(Sets::class, 'set_id');
    }

}
