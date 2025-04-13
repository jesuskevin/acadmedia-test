<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => [
                'required',
                'numeric',
                Rule::exists('courses', 'id'),
            ],
            'enrollment_id' => [
                'required',
                'numeric',
                Rule::exists('enrollments', 'id'),
            ],
            'method' => [
                'required',
                'string',
                Rule::in(['cash', 'bank_transfer']),
            ],
            'amount' => [
                'required',
                'numeric',
            ]
        ];
    }
}
