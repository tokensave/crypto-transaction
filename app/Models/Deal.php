<?php

namespace App\Models;

use App\Enums\ActionsActiveEnum;
use App\Enums\BanksEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Models\Deals\Report;
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
        'active_count',
        'deal_id',
        'report_id',
        'user_id',
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

//    public function totalAmount(): string
//    {
//        if ($this->crypto_exchange->value == CryptoExchangeEnum::garantex->value)
//        {
//            $result =  bcdiv((bcmul($this->sum->value(), $this->course->value(), 2)), 100, 2);
//
//            //Проставление процентов идет как у мейкеров на гарантаксе чтобы не путаться
//            if ($this->action->value == ActionsActiveEnum::buy->value)
//            {
//                return bcadd($this->sum->value(), bcmul($result, -1, 2), 2);
//            } else {
//                return bcdiv($this->sum->value(), $result, 2);
//            }
//
//        } else{
//            return bcdiv($this->sum->value(), $this->course->value(), 2);
//        }
//    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
