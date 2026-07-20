<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'usuario_id',
        'nome',
        'descricao',
        'imagem',
        'github',
        'deploy',
        'status',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function tecnologias()
    {
        return $this->belongsToMany(Tecnologia::class, 'projeto_tecnologia', 'projeto_id', 'tecnologia_id');
    }
}
