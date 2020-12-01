<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateAccountPesantren extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'super_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:5|unique:users,username,'.$this->user->id,
            'email' => 'required|email|min:8|unique:users,email,'.$this->user->id,
            'role' => 'required',
            'password' => 'sometimes|required|confirmed|min:8',
        ];
    }
}
