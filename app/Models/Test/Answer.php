<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'name',
        'is_right',
        'question_id',
    ];
}
