<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // qualquer visitante pode se cadastrar
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'sobrenome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Este e-mail já está cadastrado.',
            'password.confirmed' => 'A confirmação de senha não coincide.',
        ];
    }
}
