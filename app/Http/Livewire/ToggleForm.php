<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleForm extends Component
{
    public $showForm = false;

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function render()
    {
        return view('livewire.toggle-form');
    }
}
