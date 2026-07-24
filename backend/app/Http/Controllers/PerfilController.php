<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
     public function show(Request $request)
    {
        return response()->json($request->user());
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:100'],
            'sobrenome' => ['sometimes', 'string', 'max:100'],
            'foto' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'github' => ['nullable', 'string', 'max:150'],
            'linkedin' => ['nullable', 'string', 'max:150'],
            'website' => ['nullable', 'string', 'max:150'],
            'cep' => ['nullable', 'string', 'max:10'],
            'rua' => ['nullable', 'string', 'max:150'],
            'bairro' => ['nullable', 'string', 'max:100'],
            'cidade' => ['nullable', 'string', 'max:100'],
            'estado' => ['nullable', 'string', 'max:2'],
        ]);

        $request->user()->update($validated);

        return response()->json($request->user());
    }
}
