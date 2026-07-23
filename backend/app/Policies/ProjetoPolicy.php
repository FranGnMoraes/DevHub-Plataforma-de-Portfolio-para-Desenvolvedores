<?php

namespace App\Policies;

use App\Models\Projeto;
use App\Models\User;

class ProjetoPolicy
{
    public function update(User $user, Projeto $projeto): bool
    {
        return $user->id === $projeto->usuario_id;
    }

    public function delete(User $user, Projeto $projeto): bool
    {
        return $user->id === $projeto->usuario_id;
    }
}