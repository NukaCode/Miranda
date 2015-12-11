<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'        => 'required|email|unique:users,email',
            'display_name' => 'required|unique:users,display_name',
            'password'     => 'required|confirmed',
        ];
    }
}
