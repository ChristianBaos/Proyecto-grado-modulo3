<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoFormRequest extends FormRequest
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
            'id_vehiculo'=>'required',
            'tipo_vehiculos_id_tipo'=>'required',
            'placa'=>'required|alpha_num|max:6'
        ];
    }
    public function Messages()
    {
        return [
            'id_vehiculo.required'   => 'El atributo vehiculo numero, es obligatorio.',

            'tipo_vehiculos_id_tipo.required'  => 'El atributo Tipo De Vehiculo, es obligatorio',
           
            'placa.required'   => 'El atributo placa del vehiculo es obligatorio.',
            'placa.max'        => 'El atributo placa del vehiculo debe contener maximo de 6 letras y/o numeros.',
        ];
    }
}
