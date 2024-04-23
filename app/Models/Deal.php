<?php

namespace App\Models;

use App\Enums\ActionsActiveEnum;
use App\Enums\BanksEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'crypto_exchange',
        'action',
        'course',
        'sum',
        'provider',
        'user_id',
        'deal_id'
    ];

    protected $casts = [
        'active' => CryptoActiveEnum::class,
        'crypto_exchange' => CryptoExchangeEnum::class,
        'action' => ActionsActiveEnum::class,
        'provider' => BanksEnum::class,
        'course' => AmountValue::class,
        'sum' => AmountValue::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function totalAmount(): string
    {
        return bcdiv($this->sum->value(), $this->course->value(), 2);
    }

}
