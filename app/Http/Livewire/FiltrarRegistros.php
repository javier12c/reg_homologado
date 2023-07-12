<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cat_expediente;
use App\Models\Servidorespublico;
use App\Models\Cat_unidadependencia;

class FiltrarRegistros extends Component
{
    public $expediente;
    public $termino;
    public $dependencia;
    public function leerDatosFormulario()
    {
        $this->emit('terminosBusqueda', $this->termino, $this->expediente, $this->dependencia);
    }
    public function render()
    {
        $cat_unidadepedencias = Cat_unidadependencia::all();
        $expedientes = Cat_expediente::all();
        return view('livewire.filtrar-registros', [
            'cat_unidadepedencias' => $cat_unidadepedencias,
            'expedientes' => $expedientes
        ]);
    }
}
