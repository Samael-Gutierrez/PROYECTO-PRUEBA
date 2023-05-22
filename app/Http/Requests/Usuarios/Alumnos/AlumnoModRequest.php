<?php

namespace App\Http\Requests\Usuarios\Alumnos;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlumnoModRequest extends FormRequest
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
            'matricula' => ['required', 'max:15', Rule::unique('usuarios','matricula')->withoutTrashed()->ignore($this->usuario)],
            //requerido, máximo 25 caracteres, letras, espacios
            'nombre' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido, máximo 25 caracteres, letras
            'apellido_paterno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido, máximo 25 caracteres, letras
            'apellido_materno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido,email,único,máximo 60 caracteres
            'email' => ['required','email','max:60', Rule::unique('usuarios','email')->withoutTrashed()->ignore($this->usuario)],
            //requerido
            'idtu' => 'required',
            //requerido
            'sexo' => 'required',
            //requerido, minimo 8 caracteres alfanúmericos
            'password' => 'confirmed',
            //requerido
            'idg' => 'required'
        ];
    }
}
