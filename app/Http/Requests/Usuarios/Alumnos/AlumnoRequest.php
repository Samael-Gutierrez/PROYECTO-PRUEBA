<?php

namespace App\Http\Requests\Usuarios\Alumnos;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //requerido
            'matricula' => 'required|max:15|unique:usuarios,matricula',
            //requerido, máximo 25 caracteres, letras, espacios
            'nombre' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido, máximo 25 caracteres, letras
            'apellido_paterno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido, máximo 25 caracteres, letras
            'apellido_materno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            //requerido,email,único,máximo 60 caracteres
            'email' => 'required|email|unique:usuarios,email|max:60',
            //requerido
            'idtu' => 'required',
            //requerido
            'sexo' => 'required',
             //requerido, minimo 8 caracteres alfanúmericos
            'password' => 'required|string|min:8',
            //requerido
            'idg' => 'required'
        ];
    }
}
