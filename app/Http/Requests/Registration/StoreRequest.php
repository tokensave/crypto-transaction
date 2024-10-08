<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge(['money_capital' => "0"]);
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:filter', 'max:100', 'unique:users'],
            'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            'agreement' => ['accepted'],
            'money_capital' => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ];
    }
}
