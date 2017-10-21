<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'title' => 'required|max:255',
            'detail' => 'required|max:255|min:5',
            'genre' => 'required|max:255',
//            'parent_id'   => 'integer',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Category Title is required',
            'detail.required' => 'Category detail is required',
            'genre.required' => 'Category Genre is required',
//            'parent_id.integer' => 'Category integer must be integer'
        ];
    }
}
