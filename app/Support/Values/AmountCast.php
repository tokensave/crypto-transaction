<?php

namespace App\Support\Values;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class AmountCast implements CastsAttributes
{

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (is_null($value))
            return null;

        return new AmountValue($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (is_null($value))
            return null;

        if (!($value instanceof AmountValue))
            $value = new AmountValue($value);

        return $value->value();
    }
}
