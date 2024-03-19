<?php

namespace App\Enums;

enum ActionsActiveEnum: string
{
    case buy = 'buy';
    case sell = 'sell';

    public static function select()
    {
        return [
            self::buy->value => 'Покупка',
            self::sell->value => 'Продажа',
        ];
    }

    public function name(): string
    {
        return match ($this)
        {
            self::buy => 'Покупка',
            self::sell => 'Продажа',
        };
    }
}
