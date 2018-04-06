<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsValidation extends FormRequest
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
            'isim' =>'required|string|max:50',
            'email'=>'required|string|max:50',
            'konu' =>'required|string|max:50',
            'mesaj'=>'required|string|max:1000',
        ];
    }
}
