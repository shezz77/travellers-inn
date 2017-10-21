<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 8/1/2017
 * Time: 6:13 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'post_title' => 'required|max:255',
            'post_description' => 'required',
            'country_id'   => 'integer',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'post_title.required' => 'Post Title is required',
            'post_title.max' => 'Please short down post title',
            'post_description.required' => 'Post Detail is required',
            'country_id.integer' => 'Country is required'
        ];
    }
}