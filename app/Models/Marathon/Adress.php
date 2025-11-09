<?php

namespace App\Models\Marathon;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'city',
        'street',
        'building',
    ];

}
