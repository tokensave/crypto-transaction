<?php

namespace App\Enums;

enum CryptoActiveEnum: string
{
    case usdt = 'usdt';
    case btc = 'btc';
    case eth = 'eth';
    case rub = 'rub';

    public static function select()
    {
        return [
            self::usdt->value => 'USDT',
            self::btc->value => 'BTC',
            self::eth->value => 'ETH',
            self::rub->value => 'RUB'
        ];
    }

    public function name(): string
    {
        return match ($this)
        {
            self::usdt => 'USDT',
            self::btc => 'BTC',
            self::eth => 'ETH',
            self::rub => 'RUB'
        };
    }
}
