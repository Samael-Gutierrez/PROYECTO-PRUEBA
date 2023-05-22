<?php

namespace App\Http\Requests\Ciclos;

use Illuminate\Foundation\Http\FormRequest;


class RequestCicloEscolar extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //'nombre' => requerido,unico,máximo 25 caracteres
             'nombre' => 'required|unique:ciclo_escolars,nombre|max:25',

        ];
    }
}
