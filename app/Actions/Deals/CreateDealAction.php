<?php
namespace App\Actions\Deals;

use App\Models\Deal;

class CreateDealAction
{
    public function run(CreateDealData $data): Deal
    {
        return Deal::query()->create([
            'active' => $data->active,
            'crypto_exchange' => $data->exchange,
            'action' => $data->action,
            'course' => $data->course->value(),
            'sum' => $data->sum->value(),
            'provider' => $data->provider,
            'active_count' => $data->active_count,
            'cost' => $data->cost,
            'deal_id' => $data->dealId,
            'user_id' => $data->userId,
            'report_id' => $data->reportId
        ]);
    }
}
