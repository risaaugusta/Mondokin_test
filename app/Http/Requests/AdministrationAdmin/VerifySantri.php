<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class VerifySantri extends FormRequest
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
            'santri_id' => 'required|exists:santris,id',
            'username' => 'required|string|unique:users,username',
            'nis' => 'required|numeric',
            'password' => 'required|string|confirmed|min:8'
        ];
    }
}
