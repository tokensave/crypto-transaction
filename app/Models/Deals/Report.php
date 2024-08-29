<?php

namespace App\Models\Deals;

use App\Models\Deal;
use App\Models\User;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'usdt_count',
        'btc_count',
        'eth_count',
        'garantex_count',
        'remainder_capital',
        'profit',
        'user_id',
        'deal_id',
    ];

    protected $casts = [
        'remainder_capital' => AmountValue::class,
        'profit' => AmountValue::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
