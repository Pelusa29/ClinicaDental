<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return true;
        $permission = $this->route('permission');
        return $this->user()->can('update', $permission);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles|max:255',
            'role_id' => 'required|numeric',
            'description' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo de nombre es requerido',
            'name.unique' => 'El nombre ya esta ocupado',
            'role_id.required' => 'El campo rol es necesario',
            'role_id.numeric' => 'El campo rol debe ser numerico',
            'description.required' => 'La descripción es requerida',
        ];
    }
}
