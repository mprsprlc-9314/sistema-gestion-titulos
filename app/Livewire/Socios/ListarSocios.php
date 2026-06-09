<?php

namespace App\Livewire\Socios;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Socio;

class ListarSocios extends Component
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
        $socios = Socio::query()
            ->when($this->buscar, function ($query) {
                $query->where('nombres', 'like', '%' . $this->buscar . '%')
                    ->orWhere('apellidos', 'like', '%' . $this->buscar . '%')
                    ->orWhere('codigo_socio', 'like', '%' . $this->buscar . '%')
                    ->orWhere('numero_documento', 'like', '%' . $this->buscar . '%');
            })
            ->when($this->estado, function ($query) {
                $query->where('estado', $this->estado);
            })
            ->orderBy('apellidos')
            ->paginate(10);

        return view('livewire.socios.listar-socios', [
            'socios' => $socios
        ]);
    }
}