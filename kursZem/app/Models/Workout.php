<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public $timestamps=false;
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'creationDate',
    ];
}
