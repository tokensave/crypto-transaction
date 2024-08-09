<?php

namespace App\Models;


use App\Enums\CryptoExchangeEnum;
use App\Support\Values\AmountValue;
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
        'password_at',
        'email_confirmed_at',
        'money_capital'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'online_at' => 'datetime',
        'password_at' => 'datetime',
        'email_confirmed_at' => 'datetime',
        'money_capital' => AmountValue::class
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

    public function isEmailConfirm(): bool
    {
        return (bool) $this->email_confirmed_at;
    }

    public function confirmEmail(): bool
    {
        return $this->update(['email_confirmed_at' => now()]);
    }
}
