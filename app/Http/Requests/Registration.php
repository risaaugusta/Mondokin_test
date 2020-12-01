<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registration extends FormRequest
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
            'pesantren_id' => 'required|exists:pesantrens,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:male,female',
            'birthplace' => 'required|string',
            'birthdate' => 'required|date',
            'religion' => 'required|string',
            'postal' => 'required|digits_between:1,5',
            'address' => 'required|string',
            'photo' => 'nullable|image',
            'pesantren_type_id' => 'required|exists:pesantren_types,id',
            'class_id' => 'required|exists:classes,id',
            'phone' => 'required|numeric|digits_between:6,15',
        ];
    }
}
