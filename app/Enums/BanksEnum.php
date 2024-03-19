<?php

namespace App\Enums;

enum BanksEnum: string
{
    case sber = 'sberbank';
    case tinkoff = 'tinkoff';
    case raif = 'raiffaizen';
    case alfa = 'alfa';
    case sbp = 'sbp';


    public static function select()
    {
        return [
            self::sber->value => 'Сбербанк',
            self::tinkoff->value => 'Тинькофф',
            self::raif->value => 'Райфайзен',
            self::alfa->value => 'Альфа-банк',
            self::sbp->value => 'СБП',
        ];
    }

    public function name(): string
    {
        return match ($this)
        {
            self::sber => 'Сбербанк',
            self::tinkoff => 'Тинькофф',
            self::raif => 'Райфайзен',
            self::alfa => 'Альфа-банк',
            self::sbp => 'СБП',
        };
    }
}
