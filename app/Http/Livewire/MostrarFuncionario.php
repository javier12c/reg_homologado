<?php

namespace App\Http\Livewire;

use App\Models\Servidorespublico;
use Livewire\Component;

class MostrarFuncionario extends Component
{
    public $termino;
    public $dependencia;
    protected $listeners = ['EliminarFuncionario', 'terminosBusqueda' => 'buscar'];
    public function EliminarFuncionario(Servidorespublico $funcionario)
    {
        $funcionario->delete();
    }
    public function buscar($termino, $dependencia)
    {
        $this->termino = $termino;
        $this->dependencia = $dependencia;
    }

    public function render()
    {
        $funcionarios = Servidorespublico::orderBy('created_at', 'DESC')->when($this->termino, function ($query) {
            $query->where('emp_nombre', 'LIKE', "%" . $this->termino . "%");
        })->when($this->termino, function ($query) {
            $query->orWhere('emp_apellido', 'LIKE', "%" . $this->termino . "%");
        })->when($this->termino, function ($query) {
            $query->orWhere('emp_puesto', 'LIKE', "%" . $this->termino . "%");
        })->when($this->dependencia, function ($query) {
            $query->where('emp_fkdepedencia', $this->dependencia);
        })
            ->paginate();

        return view('livewire.mostrar-funcionario', [
            'funcionarios' => $funcionarios,
        ]);
    }
}
