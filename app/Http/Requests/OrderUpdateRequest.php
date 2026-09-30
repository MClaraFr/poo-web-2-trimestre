<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'sometimes|integer|exists:customers,id',
            'status' => 'sometimes|string|in:pending,paid,cancelled',
            'total' => 'sometimes|numeric',
        ];
    }
}