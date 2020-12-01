<?php

namespace App\Http\Requests\FinanceAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class StoreTopup extends FormRequest
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
            'santri_id' => 'required|exists:santris,id',
            'type' => 'required|string',
            'amount' => 'required|numeric|min:1000',
            'notes' => 'nullable|string'
        ];
    }
}
