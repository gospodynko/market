<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreReviewRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->id() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|string|max:1000',
            'rate' => 'in:1,2,3,4,5',
            'parent_review_id' => 'exists:product_reviews,id',
        ];
    }
}
