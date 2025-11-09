<?php

namespace App\Models\Marathon;

use App\Models\TimeSlots;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Work extends Model
{
    protected $table = 'works';

    protected $fillable = [
        'day_work',
        'is_weekend',
    ];

    public function time(): MorphMany
    {
        return $this->morphMany(TimeSlots::class, 'relation');
    }
}
