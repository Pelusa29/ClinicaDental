<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth = $this->user();
        return $this->user()->can('update_password',$auth);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => [
                'required',
                function ($attribute,$value, $fail){
                    if(!Hash::check($value, $this->user()->password)){
                        $fail($attribute .'no coincide');
                    }
                }
            ],
            'password' =>  'required|string|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'este campos es requerido',
            'old_password.string' => 'El valor no es correcto',
            'old_password.min' => 'tu contraseña debe tener al menos 8 caracteres',
        ];
    }
}
