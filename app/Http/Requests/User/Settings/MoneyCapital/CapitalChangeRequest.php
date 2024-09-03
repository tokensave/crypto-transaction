<?php

namespace App\Http\Requests\User\Settings\MoneyCapital;

use Illuminate\Foundation\Http\FormRequest;

class CapitalChangeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'money_capital' => format_number($this->money_capital),
        ]);
    }
    public function rules(): array
    {
        return [
            'money_capital' => ['required', 'numeric'],
        ];
    }
}
