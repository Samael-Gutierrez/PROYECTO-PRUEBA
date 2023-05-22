<?php

namespace App\Http\Requests\Usuarios\Docentes;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest
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
            //requerido, máximo 15 caracteres, único
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
            'password' => 'required|string|min:8'
        ];
    }

    public function messages()
{
    return [
        'matricula.required' => 'El campo Clave Empleado es obligatorio.',
        'matricula.max' => ' Clave Empleado no debe ser mayor que 15 caracteres.',
        'matricula.unique' => 'El campo Clave Empleado ya ha sido registrado.'
    ]; 
}

}
