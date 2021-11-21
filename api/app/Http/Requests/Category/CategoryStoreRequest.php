<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'summary'   => 'nullable|string',
            'photo'     => 'nullable',
            'is_parent' => 'nullable|boolean',
            'parent_id' => 'nullable',
            'status'    => 'nullable|boolean'
        ];
    }
}
