<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Models\Kort;
class KortValidation extends FormRequest
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

    public function rules()
    {

        $kort = Kort::find($this->kort);
       
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'isim'=> 'required|string|max:50|unique:korts', 
                    'saat_ucreti'=>  'required|integer',
                    'saat_puani'=>  'required|integer',
                    'type'=>  'required|integer',
                    'durum'=> 'required|integer',
                ];
            }
            case 'PUT':
            return [
                'isim'=> 'required|string|max:50|unique:korts,isim,' .$this->kort->id, 
                'saat_ucreti'=>  'required|integer',
                'saat_puani'=>  'required|integer',
                'type'=>  'required|integer',
                'durum'=> 'required|integer',
            ];
            case 'PATCH':
            {
                return [
                    'isim'=> 'required|string|max:50|unique:korts,isim,' .$this->kort->id, 
                    'saat_ucreti'=>  'required|integer',
                    'saat_puani'=>  'required|integer',
                    'type'=>  'required|integer',
                    'durum'=> 'required|integer',
                ];
            }
            default:break;
        }

    }
}