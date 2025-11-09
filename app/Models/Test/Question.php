<?php

namespace App\Models\Test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Monolog\Level;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'name',
        'level_id'
    ];

    public function level(): HasMany
    {
        return $this->hasMany(Level::class);
    }
}
