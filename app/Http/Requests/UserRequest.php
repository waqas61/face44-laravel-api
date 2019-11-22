<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|regex:/[0-9]/'
        ];
        return $rules;
    }

    /**
     * Error Message array.
     *
     * @return array
     */
    public function attributes()
    {
        return  [
            'first_name' => "First Name",
            'last_name' => "Last Name",
            'email' => "Email Address",
            'phone' => "Phone Number"
        ];
    }
}
