<?php

namespace App\Http\Requests\FinanceAdmin;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreBill extends FormRequest
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
            'pesantren_id' => 'required|exists:pesantrens,id',
            'code' => 'required|string|min:1|max:10',
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
