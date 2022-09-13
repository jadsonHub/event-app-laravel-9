<?php

namespace App\Http\Requests\Reset;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'password' => 'required|min:5|max:12|confirmed',
            'password_confirmation' => 'required|min:5|max:12'
        ];
    }

    public function messages()
    {
        return [

            'password.required' => 'O campo senha é obrigatorio!',
            'password.min' => 'O campo senha não pode conter menos de 5 caracteres!',
            'password.max' => 'O campo senha não pode conter mais de 15 caracteres!',
            'password.confirmed' => 'As senhas não comferem',
            'password_confirmation.required' => 'O campo comfirmar senha é obrigatorio!',
            'password_confirmation.min' => 'O campo comfirmar senha não pode conter menos de 5 caracteres',
            'password_confirmation.max' => 'O campo comfirmar senha não pode conter mais de 15 caracteres',
        
        ];
    }
}
