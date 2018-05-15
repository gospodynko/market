<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationProduct extends FormRequest
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
            'producer' => 'required|array',
            'producer.id' => 'required',
            'producer.name' => 'required|string',
            'product' => 'required|array',
            'product.id' => 'required',
            'product.name' => 'required|string',
            'description' => 'required|string|min:6',
            'price' => 'required|between:0,999999999,99',
            'shop_id' => 'required|exists:user_shops,id',
            'currency' => 'required|array',
            'currency.id' => 'required|exists:currencies,id',
            'pay_type' => 'required|array',
            'pay_type.*.id' => 'required|exists:pay_types,id',
            'delivery_type' => 'required|array',
            'delivery_type.*.id' => 'required|exists:delivery_types,id',
            'images' => 'array'
        ];
    }

    public function messages()
    {
        return [
            'producer.required' => ',jnbmmjbgnkkmhbjjmmgb',
            'producer.id' => 'required',
            'producer.name' => 'required|string',
            'product' => 'required|array',
            'product.id' => 'required',
            'product.name' => 'required|string',
            'description' => 'required|string|min:6',
            'price' => 'required|between:0,999999999,99',
            'shop_id' => 'required|exists:user_shops,id',
            'currency' => 'required|array',
            'currency.id' => 'required|exists:currencies,id',
            'pay_type' => 'required|array',
            'pay_type.*.id' => 'required|exists:pay_types,id',
            'delivery_type' => 'required|array',
            'delivery_type.*.id' => 'required|exists:delivery_types,id',
            'images' => 'array'
        ];
    }

}
