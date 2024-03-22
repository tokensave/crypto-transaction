<?php

namespace App\Models;


use App\Enums\CryptoExchangeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'online_at',
        'crypto_exchange',
        'password_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'online_at' => 'datetime',
        'crypto_exchange' => CryptoExchangeEnum::class,
        'password_at' => 'datetime'
    ];

    public function getFullName()
    {
        return implode(' ', array_filter([
            $this->first_name,
            $this->middle_name,
            $this->last_name]
        ));
    }

    public function updatePassword(string $password): bool
    {
        return $this->update([
            'password' => $password,
            'password_at' => now(),
        ]);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
