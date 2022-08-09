<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pesonaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombres' => 'required|max:60',
            'apellidos' => 'required|max:60',
            'dni' => 'required|max:60',
            'address' => 'required|max:60'
        ];
    }
}
