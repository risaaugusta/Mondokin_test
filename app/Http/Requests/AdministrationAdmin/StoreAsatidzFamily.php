<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreAsatidzFamily extends FormRequest
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
            'user_id' => 'sometimes|required|exists:users,id',
            'name' => 'required|string',
            'nik' => 'nullable|numeric|min:7',
            'educational' => 'required',
            'status' => 'required',
            'birthplace' => 'nullable|string',
            'birthdate' => 'nullable|date',
            'occupation' => 'nullable|string',
            'income' => 'nullable|numeric',
        ];
    }
}
