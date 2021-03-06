<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServisValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sofor_adi' => 'string|required',
            'sofor_numarasi' => 'string|required',
            'plaka' => 'integer|required',
        ];
    }
}
