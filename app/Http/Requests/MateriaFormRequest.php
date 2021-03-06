<?php

namespace Piccolino\Http\Requests;

use Piccolino\Http\Requests\Request;

class MateriaFormRequest extends Request
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
            'nombre' => 'required',
            'codigo' => 'required',
            'credito' => 'required'
        ];
    }
}
