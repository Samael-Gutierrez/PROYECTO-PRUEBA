<?php

namespace App\Http\Requests\Grupos;

use Illuminate\Foundation\Http\FormRequest;

class RequestGrupo extends FormRequest
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
             'nombre' => 'required|max:25|unique:grupos,nombre', //'nombre' => 'required|unique:grupos,nombre|max:25',
             'idca' => 'required', //requerido
             'idc' => 'required', //requerido
             'identificador' => 'required|unique:grupos,identificador',
        ];
    }
}
