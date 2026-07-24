<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetoRequest;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjetoController extends Controller
{
    public function index(Request $request)
    {
        $projetos = $request->user()
        ->projetos()
        ->with('tecnologias')
        ->when($request->filled('busca'), function ($query) use ($request) {
            $query->where('nome', 'like', '%' . $request->busca . '%');
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->when($request->filled('tecnologia'), function ($query) use ($request) {
            $query->whereHas('tecnologias', function ($q) use ($request) {
                $q->where('tecnologias.id', $request->tecnologia);
            });
        })
        ->latest()
        ->get();

        return response()->json($projetos);
    }

    public function store(ProjetoRequest $request)
    {
        $projeto = $request->user()->projetos()->create($request->only([
            'nome', 'descricao', 'imagem', 'github', 'deploy', 'status',
        ]));

        if ($request->filled('tecnologias')) {
            $projeto->tecnologias()->sync($request->tecnologias);
        }

        return response()->json($projeto->load('tecnologias'), 201);
    }

    public function update(ProjetoRequest $request, Projeto $projeto)
    {
        Gate::authorize('update', $projeto);

        $projeto->update($request->only([
            'nome', 'descricao', 'imagem', 'github', 'deploy', 'status',
        ]));

        if ($request->has('tecnologias')) {
            $projeto->tecnologias()->sync($request->tecnologias);
        }

        return response()->json($projeto->load('tecnologias'));
    }

    public function destroy(Projeto $projeto)
    {
        Gate::authorize('delete', $projeto);

        $projeto->delete();

        return response()->json(null, 204);
    }
}