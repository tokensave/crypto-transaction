<?php

namespace App\Actions\Deals;

use App\Models\Deal;

class UpdateDealAction
{
    public function run(UpdateDealData $data): bool
    {
        $deal = Deal::findOrFail($data->id);

        return $deal->update([
            'active' => $data->active,
            'crypto_exchange' => $data->crypto_exchange,
            'action' => $data->action,
            'course' => $data->course,
            'sum' => $data->sum,
            'provider' => $data->provider,
            'cost' => $data->cost,
            'deal_id' => $data->deal_id,
            'active_count' => $data->active_count,
            'created_at' => $data->created_at,
        ]);
    }

}
