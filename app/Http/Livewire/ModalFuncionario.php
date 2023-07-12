<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servidorespublico;
use App\Models\Cat_unidadependencia;


class ModalFuncionario extends Component
{
    public $nombre;
    public $dependencia;
    public $apellido;
    public $email;
    public $cargo;
    public $isOpen = false;


    protected $listeners = [
        'openModal' => 'openModal',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    //Funcionario
    protected $rules = [
        'nombre' => 'required',
        'dependencia' => 'required',
        'apellido' => 'required',
        'email' => 'required|email|max:60',
        'cargo' => 'required',

    ];
    public function crearFuncionario()
    {
        $datos = $this->validate();

        Servidorespublico::create([
            'emp_nombre' => $datos['nombre'],
            'emp_apellido' => $datos['apellido'],
            'emp_correo' => $datos['email'],
            'emp_fkdepedencia' => $datos['dependencia'],
            'emp_puesto' => $datos['cargo'],
        ]);
        //Crear un mensaje
        $this->nombre = '';
        $this->email = '';
        $this->apellido = '';
        $this->dependencia = '';
        $this->cargo = '';

        // Cerrar el modal
        $this->isOpen = false;
        $this->emit('formularioGuardado');
    }
    public function render()
    {
        $cat_unidadepedencias = Cat_unidadependencia::all();

        return view('livewire.modal-funcionario', [
            'cat_unidadepedencias' => $cat_unidadepedencias,
        ]);
    }
}
