<?php

namespace App\Http\Requests\Drug;

use Illuminate\Foundation\Http\FormRequest;

class DruoUpdateRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'   => 'required|unique:drugs,code,'.$this->drug->id,
            'name'   => 'required',
            'price'  => 'required|numeric|min:0',
        ];
    }
}
