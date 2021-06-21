<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifaFormRequest extends FormRequest
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
            'id_tarifa' => 'required',
            'tipo_vehiculos_id_tipo' => 'required',
            'valor_hora' => 'required|Integer',//|digits_between:3,4',
        ];
    }

    public function Messages()
    {
        return [
            'valor_hora.required'   => 'El atributo valor tarifa * hora, es obligatorio.',
            
            //'valor_hora.digits_between'   => 'El atributo valor_hora, debe contener entre 3 a 4 digitos.',

            'id_tarifa.required'   => 'El atributo id tarifa, es obligatorio.',

            'tipo_vehiculos_id_tipo.required'   => 'El atributo tipo vehiculo asignar, es obligatorio.',

        ];
    }
}
