<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class MostrarAside extends Component
{
    public function render(User $user)
    {
        return view('livewire.mostrar-aside', [
            'user' => $user
        ]);
    }
}
