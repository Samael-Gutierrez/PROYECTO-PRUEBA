<?php

namespace App\Http\Requests\Cuatrimestres;

use Illuminate\Foundation\Http\FormRequest;


class RequestCuatrimestre extends FormRequest
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
            //'nombre' => requerido,unico,máximo 50 caracteres
             'nombre' => 'required|unique:cuatrimestres,nombre|max:50',

        ];
    }
}
