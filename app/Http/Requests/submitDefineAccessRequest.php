<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator\validateExist;

class submitDefineAccessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'code' => 'required|exists:reset_code_passwords,code',
            'code',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Le mot de passe est requis',
            'confirm_password.required' => 'La confirmation du mot de passe est requise',
            'confirm_password.same' => 'La confirmation du mot de passe est incorrecte',
            'password.same' => 'Les mots de passe ne correspondent pas',
            'code.required' => 'Le code est requis',
            'code.exists' => 'Le code n\'est pas valide.Consultez votre boite mail pour le code de verification',
        ];
    }


}
        
        