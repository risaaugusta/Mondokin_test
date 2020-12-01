<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreSubject extends FormRequest
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
            'pesantren_id' => 'required|exists:pesantrens,id',
            'code' => 'required|string',
            'name' => 'required|string',
            'grade' => 'required|numeric|min:1|max:12',
        ];
    }
}
