<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Marathon\Venue;
use App\Models\Test\Test;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'birthday',
        'level',
        'password',
        'municipal_id',
        'school_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'email_verified_at',
        'remember_token',
        'created_at',
        'deleted_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    public function municipals(): HasMany
    {
        return $this->hasMany(Municipal::class);
    }

    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

    public function parents(): HasMany
    {
        return $this->hasMany(PersonName::class);
    }

    public function tests(): HasManyThrough
    {
        return $this->hasManyThrough(Test::class, 'test_users');
    }

    public function venue(): HasManyThrough
    {
        return $this->hasManyThrough(Venue::class, 'venue_users');
    }

}
