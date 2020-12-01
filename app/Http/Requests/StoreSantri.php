<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSantri extends FormRequest
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
            'username' => 'required|string|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'name' => 'required|string|min:1',
            'gender' => 'required|string',
            'birthplace' => 'required|string',
            'birthdate' => 'required|date',
            'postal' => 'required|numeric|digits_between:1,5',
            'address' => 'required|string',
            'pesantren_type_id' => 'required|exists:pesantren_types,id',
            'class_id' => 'required|exists:classes,id',
            'phone' => 'required|numeric',
            'photo' => 'nullable|image',
        ];
    }
}
