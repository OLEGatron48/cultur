<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Municipal extends Model
{
    protected $table = 'municipals';

    protected $fillable = [
        'city',
        'name',
    ];
}
