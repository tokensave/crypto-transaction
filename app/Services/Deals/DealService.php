<?php

namespace App\Services\Deals;

use App\Actions\Deals\CreateDealAction;
use App\Actions\Deals\CreateDealData;
use App\Enums\ActionsActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Models\Deal;
use App\Models\User;
use App\Support\Values\AmountValue;
use Illuminate\Support\Facades\DB;
use Throwable;

class DealService
{
    /**
     * @throws Throwable
     */
    public function createDeal(array $data): Deal
    {
        return DB::transaction(function () use ($data) {
            return app(CreateDealAction::class)->run(new CreateDealData(
                $data['active'],
                $data['crypto_exchange'],
                $data['action'],
                new AmountValue($data['course']),
                new AmountValue($data['sum']),
                $data['provider'],
                $data['deal_id'],
                $data['user_id'],
            ));
        });
    }

    public function getDeals(User $user)
    {
        return $user->deals()->get();
    }

    public function changeUserCapital(array $data, User $user): void
    {
        $new_capital = new AmountValue($data['money_capital']);

        if (!$user->money_capital) {
            $user->update(['money_capital' => $new_capital]);
        } else {
            $result = $new_capital->add($user->money_capital->value());
            $user->update(['money_capital' => $result]);
        }
    }

    public function calculateProfit($deals)
    {
        $profit = '0';
        foreach ($deals as $deal) {
            if ($deal->action == ActionsActiveEnum::buy) {
                $profit = bcsub($profit, $deal->sum->value(), 2);
            } elseif ($deal->action == ActionsActiveEnum::sell) {
                $profit = bcadd($profit, $deal->sum->value(), 2);
            }
        }
//        // Рассчитываем прибыль
//        $value = new AmountValue('0');
//        foreach ($deals as $deal) {
//            if ($deal->action == ActionsActiveEnum::buy) {
//                $value = $value->sub($deal->sum->value(), 2);
//            } elseif ($deal->action == ActionsActiveEnum::sell) {
//                $value = $value->add($deal->sum->value(), 2);
//            }
//        }
        return $profit;
    }

    public function calculateActive($deals)
    {
        $activeBuy = '0';
        $activeSell = '0';
        foreach ($deals as $deal) {
            if ($deal->crypto_exchange !== CryptoExchangeEnum::garantex) {
                if ($deal->action == ActionsActiveEnum::buy) {
                    $activeBuy = bcadd($activeBuy, $deal->totalAmount(), 2);
                } elseif ($deal->action == ActionsActiveEnum::sell) {
                    $activeSell = bcadd($activeSell, $deal->totalAmount(), 2);
                }
            } else {
                if ($deal->action == ActionsActiveEnum::buy) {
                    $activeBuy = bcadd($activeBuy, 1, 2);
                } elseif ($deal->action == ActionsActiveEnum::sell) {
                    $activeSell = bcadd($activeSell, 1, 2);
                }
            }
        }
        return bcsub($activeBuy, $activeSell, 2);
    }

    public function activeCapitel($deals, $user, $profit)
    {
        $activeBuy = '0';
        $activeSell = '0';
        
        foreach($deals as $deal) {
            if ($deal->action == ActionsActiveEnum::buy) {
                $activeBuy = bcadd($user->money_capital->value(), $deal->sum->value(), 2);
            } elseif ($deal->action == ActionsActiveEnum::sell) {
                $activeSell = bcadd($user->money_capital->value(), $deal->sum->value(), 2);
            }
        }

        $result = bcsub($activeBuy , $activeSell, 2);

       return bcadd($result , $profit, 2);
    }

    public function calculate($num_first, $num_second)
    {
        $result = (($num_second/$num_first)-1)*100;
        return $result;
    }
}
