<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'description' => 'string|required',
            'price' => 'numeric|required',
            'stock' => 'integer|required',
            'position' => 'integer|nullable',
            'enabled' => 'boolean|nullable',
        ];
    }
}
