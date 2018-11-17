<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
        return ['name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required',
                'phone'=>'required'
               ];
    }

    
    public function messages()
    {
        return ['nombre.required' => 'Olvidaste el nombre del personaje',
                'descripcion.required' => 'Describe brevemente el personaje',
                'descripcion.max' => 'Te has pasado de caracteres, solo 255',
                'nivel.min' => 'El nivel como mínimo debe tener 0',
                'nivel.max' => 'El nivel como máximo debe tener 10',
                'nivel.integer' => 'El nivel debe ser una cifra entre 0 y 10'
               ];
    }
}
