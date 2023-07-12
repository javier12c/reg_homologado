<?php

namespace App\Http\Livewire;

use App\Models\Cat_expediente;
use Livewire\Component;
use App\Models\Cat_unidadependencia;

class ModalExpediente extends Component
{
    public $nombreexpediente;
    public $dependenciass;
    public $isOpen2 = false;
    protected $listeners = ['MostrarPagina',  'openModal2' => 'openModal2'];

    public function openModal2()
    {
        $this->isOpen2 = true;
    }

    public function closeModal2()
    {
        $this->isOpen2 = false;
    }


    protected $rules = [
        'nombreexpediente' => 'required',
    ];
    public function MostrarPagina()
    {
        return view('registro.index');
    }
    public function crearExpediente()
    {
        $datos = $this->validate();
        Cat_expediente::create([
            'exp_nombre' => $datos['nombreexpediente'],
        ]);
        //Crear un mensaje
        $this->nombreexpediente = '';


        // Cerrar el modal
        $this->isOpen2 = false;
        $this->emit('formularioGuardado');
    }
    public function render()
    {

        $cat_unidadepedencias = Cat_unidadependencia::all();
        return view(
            'livewire.modal-expediente',
            [
                'cat_unidadepedencias' => $cat_unidadepedencias,
            ]
        );
    }
}
