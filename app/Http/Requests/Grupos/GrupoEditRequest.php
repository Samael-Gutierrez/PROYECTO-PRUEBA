<?php

namespace App\Http\Requests\Grupos;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GrupoEditRequest extends FormRequest
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
            'nombre' => ['required', 'max:25', Rule::unique('grupos','nombre')->withoutTrashed()->ignore($this->grupo)],
            'idca' => 'required',
            'idc'  => 'required'
            // 'identificador' => ['required', 'max:25', Rule::unique('grupos','identificador')->withoutTrashed()->ignore($this->grupo)]
        ];
    }
}
