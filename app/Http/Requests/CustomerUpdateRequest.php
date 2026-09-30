<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:customers,email',
            'phone' => 'sometimes|string',
            'birth_date' => 'sometimes|date',
        ];
    }
}
