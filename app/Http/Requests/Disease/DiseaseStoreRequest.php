<?php

namespace App\Http\Requests\Disease;

use Illuminate\Foundation\Http\FormRequest;

class DiseaseStoreRequest extends FormRequest
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
            'code' => 'required|unique:diseases,code',
            'name' => 'required',
            'remark' => '',
        ];
    }
}
