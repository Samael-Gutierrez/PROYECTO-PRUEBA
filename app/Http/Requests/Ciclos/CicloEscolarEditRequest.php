<?php

namespace App\Http\Requests\Ciclos;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CicloEscolarEditRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'max:25', Rule::unique('ciclo_escolars','nombre')->withoutTrashed()->ignore($this->ciclo)]
        ];
    }
}
