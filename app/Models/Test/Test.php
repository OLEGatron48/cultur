<?php

namespace App\Models\Test;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Test extends Model
{
    protected $table = 'tests';

    protected $fillable = [
        'name',
    ];

    public function question(): HasManyThrough
    {
        return $this->hasManyThrough(Question::class, 'test_answers');
    }

    public function user(): HasManyThrough
    {
        return  $this->hasManyThrough(User::class, TestUser::class);
    }
}
