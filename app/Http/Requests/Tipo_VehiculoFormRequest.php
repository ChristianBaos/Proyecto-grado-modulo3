<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tipo_VehiculoFormRequest extends FormRequest
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
            'id_tipo'=>'required|max:10',
            'nombre'=>'required|in:Automovil,Motocicleta,Otro|max:25',
            'descripcion'=>'max:25',
        ];
    }

    public function Messages()
    {
        return [
            'id_tipo.required'   => 'El atributo Vehiculo Numero, es obligatorio.',
            'id_tipo.max'   => 'El atributo Vehiculo Numero, debe contener un maximo de 10 digitos.',

            'nombre.required'   => 'El atributo Tipo Vehiculo, es obligatorio.',
            'nombre.in'   => 'El atributo Tipo Vehiculo que acabas de seleccionar, no es valido.',

            'descripcion.max'   => 'El atributo Descripcion, debe contener un maximo de 25 letras.',
        ];
    }
}
