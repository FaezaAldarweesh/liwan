<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signup_freelancerRequest extends FormRequest
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
            'freelancer_name' => 'required|string|max:30|regex:/^[\pL\s]+$/u',
            'study' => 'required|string|max:50',
            'phone' => 'required|string|max:9',
            'email' => 'required|email|unique:users,email',
            'brithdate' => 'required|date',
            'address' => 'required|string|max:40',
            'experience' => 'required|string|max:150',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'The freelancer name field must contain letters only.',
        ];
    }
}
