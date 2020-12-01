<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreAsatidzSchedule extends FormRequest
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
            'asatidz_id' => 'required|exists:asatidzs,id',
            'name' => 'required|string|min:3',
            'day' => 'required|string|min:3',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required',
        ];
    }
}
