<?php

namespace App\Http\Controllers;

use App\Models\User;

class PortfolioController extends Controller
{
    public function show(User $user)
    {
        $user->load(['projetos' => function ($query) {
            $query->with('tecnologias')->latest();
        }]);

        return response()->json([
            'name' => $user->name,
            'sobrenome' => $user->sobrenome,
            'foto' => $user->foto,
            'bio' => $user->bio,
            'github' => $user->github,
            'linkedin' => $user->linkedin,
            'website' => $user->website,
            'cidade' => $user->cidade,
            'estado' => $user->estado,
            'projetos' => $user->projetos,
        ]);
    }
}