<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarUsuario extends Component
{
    public function verRegistros($usuarioId)
    {
        return redirect()->route('user-registros', ['usuarioId' => $usuarioId]);
    }
    public function render()
    {
        $users = User::where('rol', 1)->paginate();
        return view('livewire.mostrar-usuario', [
            'users' => $users,
        ]);
    }
}
