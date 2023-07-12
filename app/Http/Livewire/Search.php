<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;

class Search extends Component
{
    public $dateRange;
    public $count;


    public function render()
    {
        return view('livewire.search');
    }

    public function countRecords()
    {
        $dates = explode(' to ', $this->dateRange);

        if (count($dates) === 2) {
            $startDate = \DateTime::createFromFormat('d/m/Y', $dates[0])->format('d-m-y');
            $endDate = \DateTime::createFromFormat('d/m/Y', $dates[1])->format('d-m-y');

            if (auth()->user()->rol === 1) {
                $this->count = Registro::where('reg_fkusuario', auth()->user()->id)->whereBetween('created_at', [$startDate, $endDate])->count();
            } else {
                $this->count = Registro::whereBetween('created_at', [$startDate, $endDate])->count();
            }
        }
    }
}
