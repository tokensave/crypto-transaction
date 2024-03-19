<?php

namespace App\Enums;

enum CryptoExchangeEnum : string
{
    case bybit = 'bybit';
    case huobi = 'huobi';
    case garantex = 'garantex';

    public static function select()
    {
        return [
            self::bybit->value => 'Bybit',
            self::huobi->value => 'Huobi',
            self::garantex->value => 'Garantex'
        ];
    }

    public function name(): string
    {
        return match ($this)
        {
            self::bybit => 'Bybit',
            self::huobi => 'Huobi',
            self::garantex => 'Garantex'
        };
    }

}
