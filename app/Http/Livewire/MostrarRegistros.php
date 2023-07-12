<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registro;
use App\Exports\RegistroExport;
use Maatwebsite\Excel\Facades\Excel;

class MostrarRegistros extends Component
{
    public $expediente;
    public $termino;
    public $dependencia;
    public $botonesBloqueados = [];
    public $registroId;

    protected $listeners = ['terminosBusqueda' => 'buscar'];
    public function buscar($termino, $expediente, $dependencia)
    {
        $this->termino = $termino;
        $this->dependencia = $dependencia;
        $this->expediente = $expediente;
    }
    public function render()
    {
        if (auth()->user()->rol === 2) {
            $registros = Registro::orderBy('created_at', 'DESC')->when($this->termino, function ($query) {
                $query->where('reg_asunto', 'LIKE', "%" . $this->termino . "%");
            })->when($this->termino, function ($query) {
                $query->orWhere('reg_ndocumento', 'LIKE', "%" . $this->termino . "%");
            })->when($this->dependencia, function ($query) {
                $query->where('reg_fkdepedencia', $this->dependencia);
            })->when($this->expediente, function ($query) {
                $query->where('reg_fkexpediente', $this->expediente);
            })
                ->paginate();
        } else {

            $registros = Registro::where('reg_fkusuario', auth()->user()->id)->when($this->termino, function ($query) {
                $query->where('reg_asunto', 'LIKE', "%" . $this->termino . "%");
            })->when($this->termino, function ($query) {
                $query->orWhere('reg_ndocumento', 'LIKE', "%" . $this->termino . "%");
            })->when($this->dependencia, function ($query) {
                $query->where('reg_fkdepedencia', $this->dependencia);
            })->when($this->expediente, function ($query) {
                $query->where('reg_fkexpediente', $this->expediente);
            })
                ->paginate();
        }

        return view('livewire.mostrar-registros', [
            'registros' => $registros,
        ]);
    }
    public function exportarExcel($id)
    {
        $registro = Registro::findOrFail($id);

        return Excel::download(new RegistroExport($registro), 'registro_' . $registro->id . '.xlsx');
    }
}
