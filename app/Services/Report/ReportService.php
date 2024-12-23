<?php

namespace App\Services\Report;

use App\Enums\ActionsActiveEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Models\User;
use Illuminate\Support\Carbon;

class ReportService
{

    public function store(User $user, string $startDate, string $endDate)
    {
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        $deals = $user->deals()->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // Проверяем, если есть сделки, используем первую для получения отчета
        if ($deals->isEmpty()) {
            // Если нет сделок, возвращаем пустой отчет или кидаем исключение
            throw new \Exception('Нет сделок за указанный период.');
        }
        $report = $deals->first()->report;

        $capital = $user->money_capital->value();
        $profit = '0';

        $balances =
            [
                'usdt' => '0',
                'btc' => '0',
                'eth' => '0',
                'rub' => '0',
            ];

        foreach ($deals as $deal) {
            $action = $deal->action;
            $active = $deal->active;
            $sum = $deal->sum->value();
            $active_count = $deal->active_count;

            //Подсчет остатка капитала и профита
            if ($action == ActionsActiveEnum::buy) {
                $capital = bcsub($capital, $sum, 2);
                $profit = bcsub($profit, $sum, 2);
            } elseif ($action == ActionsActiveEnum::sell) {
                $capital = bcadd($capital, $sum, 2);
                $profit = bcadd($profit, $sum, 2);
            }

            //Подсчет остатка активов
            $key = strtolower($active->value);

            if ($action === ActionsActiveEnum::buy) {
                $balances[$key] = bcadd($balances[$key], $active_count, 2);
            } elseif ($action === ActionsActiveEnum::sell) {
                $balances[$key] = bcsub($balances[$key], $active_count, 2);
            }

        }

        $report->update([
            'remainder_capital' => $capital,
            'profit' => $profit,
            'usdt_count' => $balances['usdt'],
            'btc_count' => $balances['btc'],
            'eth_count' => $balances['eth'],
            'garantex_count' => $balances['rub'],
        ]);

        return $report;
    }
}
