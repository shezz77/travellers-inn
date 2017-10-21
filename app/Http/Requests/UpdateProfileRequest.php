<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 8/2/2017
 * Time: 4:02 PM
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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

    public function rules()
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'date_of_birth' => 'required|max:255',
            'phone_number' => 'max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required',
            'first_name.max' => 'Please short down First Name',
            'last_name.required' => 'Last Name is required',
            'last_name.max' => 'Please short down Last Name',
            'phone_number.required' => 'Phone Number is required',
            'phone_number.max' => 'Please short down Phone Number',
        ];
    }
}