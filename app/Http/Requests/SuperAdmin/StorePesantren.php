<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StorePesantren extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'super_admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'registration_number' => 'required|sometimes|min:5|unique:pesantrens,registration_number',
            'accreditation' => 'nullable|string|max:1',
            'province_id' => 'required',
            'regency_id' => 'required',
            'phone' => 'required|min:8|max:15',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ];
    }
}
