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
                'phone'=>'required',
                'pass' => 'required'
               ];
    }


    public function messages()
    {
        return ['name.required' => 'El nombre es obligatorio',
                'email.required' => 'El correo es obligatorio',
                'email.unique' => 'El correo ya esta en uso',
                'phone.required' => 'El telefono es obligatorio',
                'pass.required' => 'La contraseña es obligatoria'
               ];
    }
}
