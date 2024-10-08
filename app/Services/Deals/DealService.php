<?php

namespace App\Services\Deals;

use App\Actions\Deals\CreateDealAction;
use App\Actions\Deals\CreateDealData;
use App\Actions\Deals\UpdateDealAction;
use App\Actions\Deals\UpdateDealData;
use App\Enums\ActionsActiveEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Models\Deal;
use App\Models\Deals\Report;
use App\Models\User;
use App\Support\Values\AmountValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
                $data['created_at'],
            ));
        });
    }


    public function getDeals(User $user)
    {
        return $user->deals()->get();
    }

    public function calculate($data)
    {
        $result = (($data['second_num'] / $data['first_num']) - 1) * 100;

        return $result;
    }

    public function crossCalculate($data)
    {
        $result_one = $data['sum_buy'] / $data['course_buy'];

        $response = Http::get('https://api.huobi.pro/market/tickers');
        // Преобразуем JSON ответ в массив
        $res = $response->json();

        // Выбираем нужные курсы криптовалют, например, BTC/USDT и ETH/USDT
        $cryptoRates = [
            'BTC/USDT' => $this->getCryptoRate($res, 'btcusdt'),
            'ETH/USDT' => $this->getCryptoRate($res, 'ethusdt'),
        ];

        if ($data['active_buy'] == CryptoActiveEnum::usdt->name) {
            match ($data['active_sell']) {
                CryptoActiveEnum::btc->name => $result_two = $result_one / $cryptoRates['BTC/USDT'],
                CryptoActiveEnum::eth->name => $result_two = $result_one / $cryptoRates['ETH/USDT'],
            };
        } else {
            match ($data['active_buy']) {
                CryptoActiveEnum::btc->name => $result_two = $result_one * $cryptoRates['BTC/USDT'],
                CryptoActiveEnum::eth->name => $result_two = $result_one * $cryptoRates['ETH/USDT'],
            };
        }


        return $result_two;

    }

    private function getCryptoRate($data, $symbol)
    {
        foreach ($data['data'] as $ticker) {
            if ($ticker['symbol'] === $symbol) {
                return $ticker['close'];
            }
        }
        return null;
    }

    public function addUserCapital($data, User $user)
    {
        return $user->update(['money_capital' => $data['money_capital']]);
    }


}
