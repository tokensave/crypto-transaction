<?php

namespace App\Http\Requests\Deal;

use App\Enums\ActionsActiveEnum;
use App\Enums\BanksEnum;
use App\Enums\CryptoActiveEnum;
use App\Enums\CryptoExchangeEnum;
use App\Support\Values\AmountValue;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'active' => ['required', 'string', Rule::enum(CryptoActiveEnum::class)],
            'crypto_exchange' => ['required', 'string', Rule::enum(CryptoExchangeEnum::class)],
            'action' => ['required', 'string', Rule::enum(ActionsActiveEnum::class)],
            'course' => ['required', 'string'],
            'sum' => ['required', 'string'],
            'provider' => ['required', 'string', Rule::enum(BanksEnum::class)],
            'deal_id' => ['required', 'string'],
            'user_id' => ['integer']
        ];
    }
}
