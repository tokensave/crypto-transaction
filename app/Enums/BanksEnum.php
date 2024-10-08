<?php

namespace App\Enums;

enum BanksEnum: string
{
    case sber = 'sberbank';
    case tinkoff = 'tinkoff';
    case raif = 'raiffaizen';
    case alfa = 'alfa';
    case psb = 'psb';
    case otp = 'otp';
    case ubrir = 'ubrir';
    case uralsib = 'uralsib';
    case ozon = 'ozon';
    case mts = 'mts';
    case akbars = 'akbars';
    case rosbank = 'rosbank';
    case russtand = 'russtand';
    case vtb = 'vtb';
    case gazprom = 'gazprom';
    case sbp = 'sbp';


    public static function select()
    {
        return [
            self::sber->value => 'Сбербанк',
            self::tinkoff->value => 'Тинькофф',
            self::raif->value => 'Райфайзен',
            self::alfa->value => 'Альфа-банк',
            self::psb->value => 'ПСБ',
            self::otp->value => 'ОТП',
            self::ubrir->value => 'УБРИР',
            self::uralsib->value => 'Уралсиб',
            self::ozon->value => 'Озон',
            self::mts->value => 'МТС',
            self::akbars->value => 'АкБарс',
            self::rosbank->value => 'Росбанк',
            self::russtand->value => 'Русский Стандарт',
            self::vtb->value => 'ВТБ',
            self::gazprom->value => 'ГазпромБанк',
            self::sbp->value => 'СБП',
        ];
    }

    public function name(): string
    {
        return match ($this) {
            self::sber => 'Сбербанк',
            self::tinkoff => 'Тинькофф',
            self::raif => 'Райфайзен',
            self::alfa => 'Альфа-банк',
            self::psb => 'ПСБ',
            self::otp => 'ОТП',
            self::ubrir => 'УБРИР',
            self::uralsib => 'Уралсиб',
            self::ozon => 'Озон',
            self::mts => 'МТС',
            self::akbars => 'АкБарс',
            self::rosbank => 'Росбанк',
            self::russtand => 'Русский Стандарт',
            self::vtb => 'ВТБ',
            self::gazprom => 'ГазпромБанк',
            self::sbp => 'СБП',
        };
    }
}
