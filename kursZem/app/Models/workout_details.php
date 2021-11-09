<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workout_details extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'workout',
        'move',
        'sets',
        'reps',
    ];
}
