<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'type',
        'name',
    ];
}
