<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceStoreRequest extends FormRequest
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
        return ['domain'=>'required',
                'municipality'=>'required',
                'address'=>'required'];
    }

    
    public function messages()
    {
        return ['domain.required'=>'El nombre del departamento es obligatorio',
                'municipality.required'=>'El nombre del municipio es obligatorio',
                'address.required'=>'La direccion es obligatoria'];
    }
}
