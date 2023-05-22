<?php

namespace App\Http\Requests\AdministradoresPlataforma;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdministradorPlataformaEditRequest extends FormRequest
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
            'titulo' => 'required|max:20|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,.,]+$/',
            'nombre' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'apellido_paterno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'apellido_materno' => 'required|max:25|regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/',
            'email' => ['required', 'email', 'max:60', Rule::unique('administradores_plataforma','email')->withoutTrashed()->ignore($this->administradorPlataforma)],
            'password' => 'confirmed'
        ];
    }
}
