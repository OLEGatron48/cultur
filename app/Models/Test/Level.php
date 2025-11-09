<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';

    protected $fillable = [
        'max_level',
        'min_level',
    ];
}
