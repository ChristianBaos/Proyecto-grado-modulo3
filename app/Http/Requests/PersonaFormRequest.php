<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'num_documento'=>'required|min:7|max:11',
            'nombre'=>'required|max:25',
            'apellido'=>'required|max:25',
            'email'=>'required|email|max:25',//|unique:persona|max:25',
            'contacto'=>'required|max:10',
        ];
    }
    public function messages()
    {
        return [
            'num_documento.required'   => 'El atributo numero documento es obligatorio.',
            'num_documento.min'        => 'El atributo numero documento debe contener minimo de 7 numeros.',
            'num_documento.max'        => 'El atributo numero documento debe contener maximo de 11 numeros.',
            
            'nombre.required'   => 'El atributo nombre es obligatorio.',
            'nombre.max'        => 'El atributo nombre debe contener maximo de 25 letras.',
           
            'apellido.required'   => 'El atributo apellido es obligatorio.',
            'apellido.max'        => 'El atributo apellido debe contener maximo de 25 letras.',

            'email.required'   => 'El atributo email es obligatorio.',
            'email.max'        => 'El atributo email debe contener maximo de 25 letras y/o numeros.',

            'contacto.required'   => 'El atributo contacto es obligatorio.',
            'contacto.max'        => 'El atributo contacto debe contener maximo de 10 numeros.',

        ];
    }
}
