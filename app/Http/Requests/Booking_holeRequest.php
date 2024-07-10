<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Client\HttpClientException;


class Booking_holeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //نحول هي القيمة ل true 
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

            'dates' => 'required|array',
            'dates.*' => 'date', // تأكد من أن كل عنصر في dates هو تاريخ صحيح
            'services' => 'array', // مو حقل مطلوب لأن مو بالضرورة يحجز خدمة
            'services.*' => 'integer|exists:services,id', 
            
        ];

           
    }
}
