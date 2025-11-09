<?php

namespace App\Models\Marathon;

use Illuminate\Database\Eloquent\Model;

class Marathon extends Model
{
    protected $table = 'marathons';

    protected $fillable = [
        'name',
        'slug'
    ];
}
