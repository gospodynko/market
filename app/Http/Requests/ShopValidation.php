<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.04.18
 * Time: 14:34
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ShopValidation extends FormRequest
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
            'name' => 'required|string|min:6',
//            'logo' => 'array'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'required|string|min:6',
//            'logo' => 'array'
        ];
    }


}