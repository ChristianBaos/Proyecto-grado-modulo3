<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name'=>'required|max:25',
            'email'=>'required|email|max:50',/*|unique:users',*/
            'password'=>'min:6|confirmed',
            'identification' => 'Integer|required|digits_between:6,10',
            'estado' => 'required|in:Activo,Inactivo|max:25',
        ];
    }
}
