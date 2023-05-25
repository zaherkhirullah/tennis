<?php

namespace App\Http\Requests;

use App\Models\Stage;
use Illuminate\Foundation\Http\FormRequest;

class StageValidation extends FormRequest
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

        $stage = Stage::find($this->stage);

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name'        => 'required|string|max:50|unique:stages',
                    'hour_fee' => 'required|integer',
                    'hour_score'  => 'required|integer',
                    'type'        => 'required|integer',
                    'status'       => 'required|integer',
                ];
            }
            case 'PUT':
                return [
                    'name'        => 'required|string|max:50|unique:stages,name,'.$this->stage->id,
                    'hour_fee' => 'required|integer',
                    'hour_score'  => 'required|integer',
                    'type'        => 'required|integer',
                    'status'       => 'required|integer',
                ];
            case 'PATCH':
            {
                return [
                    'name'        => 'required|string|max:50|unique:stages,name,'.$this->stage->id,
                    'hour_fee' => 'required|integer',
                    'hour_score'  => 'required|integer',
                    'type'        => 'required|integer',
                    'status'       => 'required|integer',
                ];
            }
            default:
                break;
        }

    }
}