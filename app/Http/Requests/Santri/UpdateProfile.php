<?php

namespace App\Http\Requests\Santri;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'santri';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|unique:users,username,'.$this->id,
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'nullable|confirmed|min:8'
        ];
    }
}
