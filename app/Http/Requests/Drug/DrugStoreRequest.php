<?php

namespace App\Http\Requests\Drug;

use Illuminate\Foundation\Http\FormRequest;

class DrugStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'code'   => 'required|unique:drugs,code',
            'name'   => 'required',
            'price'  => 'required|numeric|min:0',
        ];
    }
}
