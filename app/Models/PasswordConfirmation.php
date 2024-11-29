<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\UserNotificationsEnum;

class PasswordConfirmation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'payload',
        'provider',
        'expires_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'expires_at' => 'datetime',
        'provider' => UserNotificationsEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
