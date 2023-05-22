<?php

namespace App\Http\Requests\Carreras;

use Illuminate\Foundation\Http\FormRequest;


class RequestCarrera extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
             'nombre' => 'required|unique:carreras,nombre|max:50|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
        ];
    }
}
