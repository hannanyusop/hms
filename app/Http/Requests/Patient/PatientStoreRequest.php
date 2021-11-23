<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => 'required',
            'no_ic'                 => 'required',
            'no_passport'           => 'required_without:no_ic',
            'dob'                   => 'required',
            'no_phone'              => 'required',
            'nationality'           => 'required',
            'allergies_information' => '',
            'diseases_history'      => ''
        ];
    }
}
