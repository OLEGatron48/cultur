<?php

namespace App\Models\Marathon;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Venue extends Model
{
    protected $table = 'venues';

    protected $fillable = [
        'name',
        'slug',
        'qr_code',
        'phone_id',
        'address_id',
        'marathon_id'
    ];

    public function marathon(): BelongsTo
    {
        return $this->belongsTo(Marathon::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Adress::class);
    }

    public function phone(): BelongsTo
    {
        return $this->belongsTo(Phone::class);
    }

    public function user(): HasManyThrough
    {
        return $this->HasManyThrough(User::class, 'venues');
    }
}
