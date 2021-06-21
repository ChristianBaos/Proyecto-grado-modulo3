<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ingreso_VehiculoFormRequest extends FormRequest
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
            'id_ingreso' => 'required',
            //'fecha_ingreso' => 'required|date_format:Y-m-d H:i:s',
            //'estado' => 'required',
            'users_id' => 'required',
            'vehiculos_id_vehiculo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_ingreso,required' => 'El campo Ingreso Del Vehiculo Numero, es obligatorio',
            'fecha_ingreso.required' => 'La fecha de ingreso, es obligatorio',
            'fecha_ingreso.date_format' => 'El formato de fecha, no coincide',
            'estado.required' => 'El estado, es obligatorio',
            'users_id.required' => 'El campo usuario, es obligatorio',
            'vehiculos_id_vehiculo.required' => 'El campo vehiculo, es obligatorio'
        ];
    }
}
