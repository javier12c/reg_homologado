<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Registro;
use App\Models\Cat_expediente;
use App\Models\Cat_tdocumento;
use App\Models\Servidorespublico;
use App\Models\Cat_unidadependencia;

class EditarRegistro extends Component
{
    // Declaracion de variables wire:model
    public $reg_id;
    //id
    public $reg_fecha_documento;
    public $tipo_documento;
    public $reg_ndocumento;
    public $dependencia;
    public $asunto;
    public $servidorespublicoss = null;
    public $cargo;
    public $dirigido = null;
    public $cargo2 = null;
    public $anexo;
    public $seguimiento_realizado;
    public $resguardo;
    public $hipervinculo;
    public $expediente;
    public $serie;
    public $ubicacion;
    public $observaciones;
    public $status = 1;

    //Funcionario

    // Reglas de validacion
    protected $rules = [
        'reg_fecha_documento' => 'required',
        'tipo_documento' => 'required',
        'reg_ndocumento' => 'required|string',
        'dependencia' => 'required',
        'asunto' => 'required|string',
        'servidorespublicoss' => 'required',
        'dirigido' => 'required',
        'anexo' => 'required',
        'seguimiento_realizado' => 'required',
        'resguardo' => 'required',
        'hipervinculo' => 'nullable',
        'expediente' => 'required',
        'serie' => 'required',
        'ubicacion' => 'required',
        'observaciones' => 'required',
        'status' => 'nullable',

    ];
    public function mount(Registro $registro)
    {
        $this->reg_id = $registro->id; //Este no va a funcionar 
        $this->reg_fecha_documento = Carbon::parse($registro->reg_fecha_documento)->format('Y-m-d');
        $this->tipo_documento = $registro->reg_fktdocumento;
        $this->reg_ndocumento = $registro->reg_ndocumento;
        $this->dependencia = $registro->reg_fkdepedencia;
        $this->servidorespublicoss = $registro->reg_fkasignado;
        $this->asunto = $registro->reg_asunto;
        $this->dirigido = $registro->reg_fkdirigido;
        $this->anexo = $registro->reg_anexos;
        $this->resguardo = $registro->reg_resguardo;
        $this->seguimiento_realizado = $registro->reg_seguimiento;
        $this->hipervinculo = $registro->reg_hiper;
        $this->expediente = $registro->reg_fkexpediente;
        $this->serie = $registro->reg_series;
        $this->ubicacion = $registro->reg_ubicacion;
        $this->observaciones = $registro->reg_observaciones;
        $this->status = $registro->reg_status;
    }
    public function editarRegistro()
    {
        $datos = $this->validate();
        //Encontrar la vacante a editar

        $registro = Registro::find($this->reg_id);

        //asignar los valoes
        $registro->reg_ndocumento = $datos['reg_ndocumento'];
        $registro->reg_fecha_documento = $datos['reg_fecha_documento'];
        $registro->reg_fktdocumento = $datos['tipo_documento'];
        $registro->reg_fkdepedencia = $datos['dependencia'];
        $registro->reg_fkasignado = $datos['servidorespublicoss'];
        $registro->reg_asunto = $datos['asunto'];
        $registro->reg_fkdirigido = $datos['dirigido'];
        $registro->reg_anexos = $datos['anexo'];
        $registro->reg_resguardo = $datos['resguardo'];
        $registro->reg_seguimiento = $datos['seguimiento_realizado'];
        $registro->reg_hiper = $datos['hipervinculo'];
        $registro->reg_fkexpediente = $datos['expediente'];
        $registro->reg_series = $datos['serie'];
        $registro->reg_ubicacion = $datos['ubicacion'];
        $registro->reg_observaciones = $datos['observaciones'];
        $registro->reg_status = $datos['status'];
        // $vacante->titulo = $datos['titulo'];


        //guardar la vacante
        $registro->save();
        //redireccionar
        session()->flash('mensaje', 'El registro se modifico correctamente');
        return redirect()->route('registro.show');
    }
    public function render()
    {
        $cat_tdocumentos = Cat_tdocumento::all();
        $cat_unidadepedencias = Cat_unidadependencia::all();
        $servidorespublicos = Servidorespublico::orderBy("emp_nombre", "asc")->get();
        $expedientes = Cat_expediente::all();
        return view('livewire.editar-registro', [
            'cat_tdocumentos' => $cat_tdocumentos,
            'cat_unidadepedencias' => $cat_unidadepedencias,
            'servidorespublicos' => $servidorespublicos,
            'expedientes' => $expedientes,
        ]);
    }
    public function updatedservidorespublicoss($id)
    {
        $this->cargo = Servidorespublico::find($id);
    }
    public function updateddirigido($id)
    {
        $this->cargo2 = Servidorespublico::find($id);
    }
}
