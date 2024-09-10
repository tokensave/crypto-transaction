<?php

namespace App\Services\Deals;

use App\Actions\Deals\CreateDealAction;
use App\Actions\Deals\CreateDealData;
use App\Actions\Deals\UpdateDealAction;
use App\Actions\Deals\UpdateDealData;
use App\Enums\ActionsActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Models\Deal;
use App\Models\Deals\Report;
use App\Models\User;
use App\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Throwable;

class DealService
{
    /**
     * @throws Throwable
     */
    public function createDeal(array $data, User $user): Deal
    {
        return DB::transaction(function () use ($data, $user) {
            $today = now()->toDateString();
            $report = Report::query()->firstOrCreate(
                ['user_id' => $user->id, 'date' => $today],
                [
                    'remainder_capital' => 0, // Начальное значение, если нужно
                    'profit' => 0,            // Начальное значение, если нужно
                ]
            );

            return app(CreateDealAction::class)->run(new CreateDealData(
                $data['active'],
                $data['crypto_exchange'],
                $data['action'],
                new AmountValue($data['course']),
                new AmountValue($data['sum']),
                $data['provider'],
                $data['active_count'],
                $data['cost'],
                $data['deal_id'],
                $user->id,
                $report->id
            ));
        });
    }

    public function updateDeal(array $data, string $id): bool
    {
        return DB::transaction(function () use ($data, $id) {

            return app(UpdateDealAction::class)->run(new UpdateDealData(
                $id,
                $data['active'],
                $data['crypto_exchange'],
                $data['action'],
                new AmountValue($data['course']),
                new AmountValue($data['sum']),
                $data['provider'],
                $data['cost'] ?? null,
                $data['deal_id'],
                $data['active_count'],
            ));
        });
    }


    public function getDeals(User $user)
    {
        return $user->deals()->get();
    }

    public function calculate($data)
    {
        $result = (($data['second_num']/$data['first_num'])-1)*100;

        return $result;
    }

}
