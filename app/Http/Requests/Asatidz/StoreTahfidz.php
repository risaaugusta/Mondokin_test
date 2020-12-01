<?php

namespace App\Http\Requests\Asatidz;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreTahfidz extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->role == 'asatidz';
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
            'asatidz_id' => 'required|exists:asatidzs,id',
            'type' => 'required|string',
            'juz' => 'required|numeric|min:1|max:30',
            'ayat_first' => 'required|numeric',
            'ayat_end' => 'required|numeric',
            'page_first' => 'required|numeric',
            'page_end' => 'required|numeric',
            'notes' => 'nullable|string',
        ];
    }
}
