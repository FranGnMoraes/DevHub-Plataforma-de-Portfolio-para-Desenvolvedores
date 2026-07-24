<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function index()
    {
        $tecnologias = Tecnologia::all();

        return response()->json($tecnologias);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:50', 'unique:tecnologias,nome'],
        ]);

        $tecnologia = Tecnologia::create($validated);

        return response()->json($tecnologia, 201);
    }

    public function update(Request $request, Tecnologia $tecnologia)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:50', 'unique:tecnologias,nome,' . $tecnologia->id],
        ]);

        $tecnologia->update($validated);

        return response()->json($tecnologia);
    }

    public function destroy(Tecnologia $tecnologia)
    {
        $tecnologia->delete();

        return response()->json(null, 204);
    }
}
