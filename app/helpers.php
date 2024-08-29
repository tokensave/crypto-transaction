<?php

use App\Enums\ActionsActiveEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;

function app_url(string $path = ''): string
{
    return implode('/', [
        trim(config('app.url'), '/'),
        trim($path, '/')
    ]);
}

function uuid(): string
{
    return (string) Str::uuid();
}

function code(): string
{
    return (string) rand(100000, 999999);
}

function format_number(string $number): array|string
{
    return str_replace(',', '.', $number);
}

function total_amount(string $active, string $exchange, string $action, string $sum, string $course): string
{
    $result = bcdiv(bcmul($sum, $course, 2), 100, 2);

    if ($exchange === CryptoExchangeEnum::garantex->value && $active === CryptoActiveEnum::rub->value) {
        return $action === ActionsActiveEnum::buy->value
            ? bcadd($sum, bcmul($result, '-1', 2), 2)
            : bcsub($sum, $result, 2);
    }

    return bcdiv($sum, $course, 2);
}
