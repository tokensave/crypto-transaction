<?php

namespace App\Http\Requests\Deal;

use App\Enums\CryptoExchangeEnum;
use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'first_num' => format_number($this->first_num),
            'second_num' => format_number($this->second_num),
        ]);
    }

    public function rules(): array
    {
        return [
            'first_num' => ['required', 'numeric'],
            'second_num' => ['required', 'numeric'],
        ];
    }
}
