<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Registro;
use Livewire\WithPagination;
use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;

class RegistrosUsuario extends Component
{
    public $usuarioId;
    public $expediente;
    public $termino;
    public $dependencia;
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    public function buscar($termino, $expediente, $dependencia)
    {
        $this->termino = $termino;
        $this->dependencia = $dependencia;
        $this->expediente = $expediente;
    }

    public function mount($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function render()
    {
        $user = User::find($this->usuarioId);
        $registros = $user->registros()->orderBy('created_at', 'DESC')->when($this->termino, function ($query) {
            $query->where('reg_asunto', 'LIKE', "%" . $this->termino . "%");
        })->when($this->termino, function ($query) {
            $query->orWhere('reg_ndocumento', 'LIKE', "%" . $this->termino . "%");
        })->when($this->dependencia, function ($query) {
            $query->where('reg_fkdepedencia', $this->dependencia);
        })->when($this->expediente, function ($query) {
            $query->where('reg_fkexpediente', $this->expediente);
        })->paginate(10);

        return view('livewire.registros-usuario', [
            'user' => $user,
            'registros' => $registros
        ]);
    }
    public function exportarExcel($id)
    {
        $registro = Registro::findOrFail($id);

        return Excel::download(new RegistroExport($registro), 'registro_' . $registro->id . '.xlsx');
    }
}
