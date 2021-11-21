<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'summary'   => 'required',
            'description'   => 'required',
            'photo' => 'required',
            'condition' => 'required',
            'price' => 'required',
            'discount'  => 'nullable',
            'is_featured'   => 'required',
            'category_id'   => 'nullable',
            'child_category_id' => 'nullable',
            'brand_id'  => 'nullable',
        ];
    }
}
