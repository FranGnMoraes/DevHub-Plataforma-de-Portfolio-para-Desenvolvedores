<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $usuario = $request->user();

        $totalProjetos = $usuario->projetos()->count();

        $totalFinalizados = $usuario->projetos()->where('status', 'Finalizado')->count();

        $totalEmDesenvolvimento = $usuario->projetos()->where('status', 'Em desenvolvimento')->count();

        $totalTecnologias = $usuario->projetos()
            ->with('tecnologias')
            ->get()
            ->pluck('tecnologias')
            ->flatten()
            ->pluck('id')
            ->unique()
            ->count();

        return response()->json([
            'total_projetos' => $totalProjetos,
            'total_tecnologias' => $totalTecnologias,
            'projetos_finalizados' => $totalFinalizados,
            'projetos_em_desenvolvimento' => $totalEmDesenvolvimento,
        ]);
    }
}