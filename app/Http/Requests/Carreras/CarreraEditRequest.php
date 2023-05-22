<?php

namespace App\Http\Requests\Carreras;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarreraEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'max:50', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('carreras','nombre')->withoutTrashed()->ignore($this->carrera)]
        ];
    }
}
