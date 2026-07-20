<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nome'])]
class Tecnologia extends Model
{
    public function projetos()
    {
        return $this->belongsToMany(Projeto::class, 'projeto_tecnologia', 'tecnologia_id', 'projeto_id');
    }
}