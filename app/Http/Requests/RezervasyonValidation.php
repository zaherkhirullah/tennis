<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RezervasyonValidation extends FormRequest
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
        'kort_id'           =>'required|integer' ,
        'servis_id'         =>'integer' ,
        'servis_adresi'     =>'string' ,
        'servis_saat'       =>'string' ,
        ];
    }
}
