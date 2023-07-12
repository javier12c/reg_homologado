<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cat_unidadependencia;
use App\Models\Servidorespublico;

class EditarFuncionario extends Component
{
    public $emp_id;
    public $nombre;
    public $dependencia;
    public $apellido;
    public $email;
    public $cargo;

    //Funcionario


    protected $rules = [
        'nombre' => 'required',
        'dependencia' => 'required',
        'apellido' => 'required',
        'email' => 'required|email|max:60',
        'cargo' => 'required',

    ];
    public function mount(Servidorespublico $funcionario)
    {
        $this->emp_id = $funcionario->id; //Este no va a funcionar 
        $this->nombre = $funcionario->emp_nombre;
        $this->apellido = $funcionario->emp_apellido;
        $this->email = $funcionario->emp_correo;
        $this->dependencia = $funcionario->emp_fkdepedencia;
        $this->cargo = $funcionario->emp_puesto;
    }
    public function editarFuncionario()
    {
        $datos = $this->validate();
        //Encontrar la vacante a editar

        $funcionario = Servidorespublico::find($this->emp_id);

        //asignar los valoes
        $funcionario->emp_nombre = $datos['nombre'];
        $funcionario->emp_apellido = $datos['apellido'];
        $funcionario->emp_correo = $datos['email'];
        $funcionario->emp_fkdepedencia = $datos['dependencia'];
        $funcionario->emp_puesto = $datos['cargo'];

        // $vacante->titulo = $datos['titulo'];


        //guardar la vacante
        $funcionario->save();
        //redireccionar
        session()->flash('mensaje', 'El funcionario se modifico correctamente');
        return redirect()->route('funcionarios.show');
    }
    public function render()
    {
        $cat_unidadepedencias = Cat_unidadependencia::all();

        return view('livewire.editar-funcionario', [
            'cat_unidadepedencias' => $cat_unidadepedencias,
        ]);
    }
}
