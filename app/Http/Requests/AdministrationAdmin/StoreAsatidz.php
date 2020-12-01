<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreAsatidz extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'administration_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // account rules
            'username' => 'required|string|min:5|unique:users,username,'.$this->id,
            'email' => 'required|email|min:8|unique:users,email,'.$this->id,
            'role' => 'required',
            'password' => 'sometimes|required|confirmed|min:8',
            'pesantren_id' => 'sometimes|required|exists:pesantrens,id',
            // asatidz rules
            'user_id' => 'sometimes|exists:users,id',
            'nip' => 'required|string|min:3',
            'name' => 'required|string|min:3',
            'npwp' => 'required|numeric|min:10|unique:asatidzs,npwp,'.$this->asatidz_id,
            'ktp' => 'required|numeric|min:10|unique:asatidzs,ktp,'.$this->asatidz_id,
            'religion' => 'required|string|min:3',
            'gender' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'phone' => 'required|string|min:10',
            'birthplace' => 'required|string',
            'birthdate' => 'required|date',
            'additional_task' => 'string|nullable',
            'marriage_status' => 'required|string',
            'employee_status' => 'required|string',
            'photo' => 'image|max:2048',
        ];
    }
}
