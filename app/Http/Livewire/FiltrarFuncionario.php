<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cat_unidadependencia;

class FiltrarFuncionario extends Component
{
    public $expediente;
    public $termino;
    public $dependencia;
    public function leerDatos()
    {
        $this->emit('terminosBusqueda', $this->termino, $this->dependencia);
    }
    public function render()
    {
        $cat_unidadepedencias = Cat_unidadependencia::all();

        return view('livewire.filtrar-funcionario', [
            'cat_unidadepedencias' => $cat_unidadepedencias,
        ]);
    }
}
