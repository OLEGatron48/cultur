<?php

namespace App\Models\Test;

use App\Models\TimeSlots;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class TestUser extends Model
{
    protected $table = 'test_users';

    protected $fillable = [
        'is_success',
    ];

    public function time(): MorphMany
    {
        return $this->morphMany(TimeSlots::class, 'relation');
    }
}
