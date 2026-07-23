<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // a autorização de dono é tratada à parte, na Policy
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:150'],
            'descricao' => ['required', 'string'],
            'imagem' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'regex:/^https?:\/\/.+/'],
            'deploy' => ['nullable', 'string', 'regex:/^https?:\/\/.+/'],
            'status' => ['required', 'in:Em desenvolvimento,Finalizado'],
            'tecnologias' => ['nullable', 'array'],
            'tecnologias.*' => ['integer', 'exists:tecnologias,id'],
        ];
    }
}