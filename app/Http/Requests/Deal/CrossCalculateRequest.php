<?php

namespace App\Http\Requests\Deal;

use Illuminate\Foundation\Http\FormRequest;

class CrossCalculateRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        if ($this->course_buy & $this->sum_buy & $this->course_sell)
        {
            $this->merge([
                'course_buy' => format_number($this->course_buy),
                'sum_buy' => format_number($this->sum_buy),
                'course_sell' => format_number($this->course_sell),
            ]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'course_buy' => ['required', 'numeric'],
            'sum_buy' => ['required', 'numeric'],
            'active_buy' => ['required', 'string'],
            'course_sell' => ['required', 'numeric'],
            'active_sell' => ['required', 'string'],
        ];
    }
}
