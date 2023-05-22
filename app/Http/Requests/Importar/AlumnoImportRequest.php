<?php

namespace App\Http\Requests\Importar;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoImportRequest extends FormRequest
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
              //requerido
              'carrera' => 'required',
              //requerido
              'grupo' => 'required',
              //requerido
              'idce' => 'required'
        ];
    }
}
