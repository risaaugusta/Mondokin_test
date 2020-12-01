<?php

namespace App\Http\Requests\FinanceAdmin;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreSalary extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'finance_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'asatidz_id' => 'required|exists:asatidzs,id',
            'file' => 'required|file',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
        ];
    }
}
