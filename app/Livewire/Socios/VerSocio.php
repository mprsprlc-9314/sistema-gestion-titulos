<?php

namespace App\Livewire\Socios;

use Livewire\Component;
use App\Models\Socio;

class VerSocio extends Component
{
    public $socio;

    public function mount($id)
    {
        $this->socio = Socio::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.socios.ver-socio');
    }
}