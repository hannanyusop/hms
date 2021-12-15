<?php

namespace App\Http\Requests\Appointment;

use App\Services\UserService;
use Illuminate\Foundation\Http\FormRequest;

class PharmacyCompletedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role == UserService::pharmacy;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price.*' => 'numeric|min:0.00'
        ];
    }

    public function messages()
    {
        return [
            'price.*.min' => "The price must be at least 0.00."
        ];
    }
}
