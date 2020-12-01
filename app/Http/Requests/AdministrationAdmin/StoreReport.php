<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class StoreReport extends FormRequest
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
            'year' => 'required|numeric|min:4',
            'semester' => 'required|numeric|min:1',
            'category' => 'required|string',
            'file' => 'mimes:pdf',
        ];
    }
}
