<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/29/18
 * Time: 2:16 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditValidation  extends FormRequest
{
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
            'description' => 'required|string|min:6',
            'price' => 'required|integer|min:1',
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
            'description' => 'required|string|min:6',
            'price' => 'required|integer',
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