<?php

namespace App\Http\Requests\Roles;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TipoDeUsuarioEditRequest extends FormRequest
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
            'nombre' => ['required', 'max:45', 'regex:/^[a-z,\s,A-Z,á,Á,é,É,í,Í,ó,Ó,ü,ú,Ú,ñ,Ñ,]+$/', Rule::unique('tipo_de_usuarios','nombre')->withoutTrashed()->ignore($this->tipodeusuario)]
        ];
    }
}
