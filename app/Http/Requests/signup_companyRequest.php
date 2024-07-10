<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signup_companyRequest extends FormRequest
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
            'company_name' => 'required|string|unique:companies,company_name|max:50',
            'license_number'=>'string|nullable',
            'bio' => 'required|string|max:150',
            'wdate' => 'required|date',
            'phone' => 'required|string|max:9',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:20',
            'password' => 'required|string|min:8',
        ];
    }
}
