<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandFormRequest extends FormRequest
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
            'brand_name' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Brand Name is required',
            'brand_name.regex' => 'Brand Name is not correct format',
        ];
    }
}
