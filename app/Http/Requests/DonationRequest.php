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
            'organization_id' => 'required',
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
            'trx_id' => 'required|string',
            'file' => 'nullable|file|mimes:pdf',
        ];
    }
}
