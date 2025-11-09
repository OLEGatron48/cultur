<?php

namespace App\Models\Marathon;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'country_code',
        'number',
    ];
}
