<?php

namespace App\Actions\Deals;

use App\Support\Values\AmountValue;

class UpdateDealData
{
    public function __construct(
        public readonly string $id,
        public readonly string $active,
        public readonly string $crypto_exchange,
        public readonly string $action,
        public readonly AmountValue $course,
        public readonly AmountValue $sum,
        public readonly string $provider,
        public readonly ?string $cost,
        public readonly string $deal_id,
        public readonly string $active_count,
        public readonly string $created_at,
    ){}
}
