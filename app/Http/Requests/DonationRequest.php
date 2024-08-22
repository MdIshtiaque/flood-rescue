<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'organization_id' => 'required|exists:organizations,id',
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'phone' => 'required|string',
            'trx_id' => 'required|string',
            'file' => 'nullable|file|mimes:pdf',
        ];
    }
}
