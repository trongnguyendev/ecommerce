<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'title' => 'nullable|max:255',
            'slug'  => 'unique::products',
            'summary'   => 'nullable',
            'description'   => 'nullable',
            'photo' => 'nullable',
            'condition' => 'nullable',
            'price' => 'nullable',
            'discount'  => 'nullable',
            'is_featured'   => 'nullable',
            'category_id'   => 'nullable',
            'child_category_id' => 'nullable',
            'brand_id'  => 'nullable',
        ];
    }
}
