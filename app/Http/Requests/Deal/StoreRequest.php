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
            'course' => format_number($this->input('course')),
            'sum' => format_number($this->input('sum')),
            'active_count' => $this->calculateActiveCount(),
        ]);
    }

    public function rules(): array
    {
        return [
            'active' => ['required', 'string', Rule::enum(CryptoActiveEnum::class)],
            'crypto_exchange' => ['required', 'string', Rule::enum(CryptoExchangeEnum::class)],
            'action' => ['required', 'string', Rule::enum(ActionsActiveEnum::class)],
            'course' => ['required', 'numeric'],
            'sum' => ['required', 'numeric'],
            'provider' => ['required', 'string', Rule::enum(BanksEnum::class)],
            'deal_id' => ['required', 'string'],
            'active_count' => ['required', 'string']
        ];
    }

    private function calculateActiveCount(): string
    {
        return total_amount(
            $this->input('active'),
            $this->input('crypto_exchange'),
            $this->input('action'),
            format_number($this->input('sum')),
            format_number($this->input('course')),
            $this->input('cost') ? format_number($this->input('cost')) : null
        );
    }
}
