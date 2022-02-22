<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'cat_name' => 'required|unique:categories|string|max:100,cat_name,'.request()->id,
            'cat_desc' => 'required|max:50000|string',
        ];
    }
    public function messages()
    {
        return [
            'cat_name.required' => __('nameEmpty'),
            'cat_name.unique' => __('catnameUnique'),
            'cat_name.max' => __('nameMax'),
            'cat_name.alpha_num' => __('string'),
            'cat_desc.string' => __('string'),
            'cat_desc.required' => __('descEmpty'),
            'cat_desc.max' => __('descMax'),
        ];
    }
}
