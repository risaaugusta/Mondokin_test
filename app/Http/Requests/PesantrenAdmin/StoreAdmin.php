<?php

namespace App\Http\Requests\PesantrenAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'pesantren_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:5|unique:users,username,'.$this->id,
            'email' => 'required|email|min:8|unique:users,email,'.$this->id,
            'role' => 'required',
            'password' => 'sometimes|required|confirmed|min:8',
            'pesantren_id' => 'sometimes|required',
        ];
    }
}
