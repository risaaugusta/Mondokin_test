<?php

namespace App\Http\Requests\AdministrationAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreAnnouncement extends FormRequest
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
            'title' => 'required|string|max:225',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'photo' => 'nullable|image',
        ];
    }
}
