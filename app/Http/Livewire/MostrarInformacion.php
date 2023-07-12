<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class MostrarInformacion extends Component
{
    public $user;
    public $chart;

    public function render()
    {
        return view('livewire.mostrar-informacion');
    }
}
