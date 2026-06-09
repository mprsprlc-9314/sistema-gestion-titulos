<?php

namespace App\Livewire\Titulos;

use Livewire\Component;
use App\Models\Titulo;

class VerTitulo extends Component
{
    public $titulo;

    public function mount($id)
    {
        $this->titulo = Titulo::with('socioActual')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.titulos.ver-titulo');
    }
}