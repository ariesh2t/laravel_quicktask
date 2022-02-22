<?php

namespace App\Http\Requests\Product;

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
            'product_name' => 'required|string|max:100,'.request()->id,
            'product_desc' => 'required|max:50000|string',
            'price' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:1',
            'category_id' => 'exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => __('empty', ['attr' => __('product_name')]),
            'product_name.max' => __('nameMax'),
            'product_name.string' => __('string'),
            'product_desc.required' => __('empty', ['attr' => __('desc')]),
            'product_desc.max' => __('descMax'),
            'product_desc.string' => __('string'),
            'price.required' => __('empty', ['attr' => __('price')]),
            'price.min' => __('mini', ['attr' => __('price'), 'value' => 0]),
            'price.numeric' => __('num', ['attr' => __('price')]),
            'amount.required' => __('empty', ['attr' => __('amount')]),
            'amount.min' => __('mini', ['attr' => __('amount'), 'value' => 1]),
            'amount.numeric' => __('num', ['attr' => __('amount')]),
            'category_id.exists' => __('exists'),
        ];
    }
}
