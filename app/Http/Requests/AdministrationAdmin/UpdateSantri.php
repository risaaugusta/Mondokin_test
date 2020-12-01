<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSantri extends FormRequest
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
            'username' => 'required|string|unique:users,username,'.$this->user_id,
            'email' => 'required|email|unique:users,email,'.$this->user_id,
            // 'password' => 'required|confirmed',
            'name' => 'required|string|min:1',
            'gender' => 'required|string',
            'birthplace' => 'required|string',
            'birthdate' => 'required|date',
            'postal' => 'required|numeric|digits_between:1,5',
            'address' => 'required|string',
            'live_status' => 'required|string',
            'phone' => 'required|numeric',
            'photo' => 'nullable|image',
        ];
    }
}
