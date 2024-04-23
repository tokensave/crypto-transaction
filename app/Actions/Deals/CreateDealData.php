<?php

namespace App\Actions\Deals;

use App\Support\Values\AmountValue;

class CreateDealData
{
    public function __construct(
      public readonly string $active,
      public readonly string $exchange,
      public readonly string $action,
      public readonly AmountValue $course,
      public readonly AmountValue $sum,
      public readonly string $provider,
      public readonly string $dealId,
      public readonly int $userId,
    ){}
}
