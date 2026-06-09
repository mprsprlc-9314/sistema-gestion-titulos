<?php

namespace App\Livewire\Titulos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Titulo;

class ListarTitulos extends Component
{
    use WithPagination;

    public $buscar = '';
    public $estado = '';

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function render()
    {
        $titulos = Titulo::query()
            ->with('socioActual')
            ->when($this->buscar, function ($query) {
                $query->where('numero_titulo', 'like', '%' . $this->buscar . '%')
                    ->orWhereHas('socioActual', function ($q) {
                        $q->where('nombres', 'like', '%' . $this->buscar . '%')
                          ->orWhere('apellidos', 'like', '%' . $this->buscar . '%');
                    });
            })
            ->when($this->estado, function ($query) {
                $query->where('estado', $this->estado);
            })
            ->orderBy('numero_titulo')
            ->paginate(10);

        return view('livewire.titulos.listar-titulos', [
            'titulos' => $titulos
        ]);
    }
}