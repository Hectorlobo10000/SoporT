<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
                    'description'=>'required',
                    // 'technician_id' =>'required'

               ];
    }


    public function messages()
    {
        return ['description.required' => 'La descripción es obligatoria',
            // 'technician_id.required' => 'No hay un técnico disponible en este momento. Intente mas tarde.',
    ];
    }
}
