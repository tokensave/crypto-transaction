<?php

namespace App\Support\Values;

use Illuminate\Contracts\Database\Eloquent\Castable;
use InvalidArgumentException;

class AmountValue implements Castable
{
    private string $value;

    public function __construct(string $value)
    {
        if (!is_numeric($value))
            throw new InvalidArgumentException(
                'Неверное значение: ' . $value,
            );

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function castUsing(array $arguments): string
    {
        return AmountCast::class;
    }

    public function add(string|int|AmountValue|float $value, int $scale = null)
    {
        $value = new AmountValue($value);
        return bcadd($this->value, $value->value(), $scale);
    }

    public function sub(string|int|AmountValue|float $value, int $scale = null)
    {
        $value = new AmountValue($value);
        return bcsub($this->value, $value->value(), $scale);
    }
}
