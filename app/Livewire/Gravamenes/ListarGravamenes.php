<?php

namespace App\Livewire\Gravamenes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gravamen;

class ListarGravamenes extends Component
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
        $gravamenes = Gravamen::query()
            ->with('titulo')
            ->when($this->buscar, function ($query) {
                $query->whereHas('titulo', function ($q) {
                    $q->where('numero_titulo', 'like', '%' . $this->buscar . '%');
                })->orWhere('entidad', 'like', '%' . $this->buscar . '%');
            })
            ->when($this->estado, function ($query) {
                $query->where('estado', $this->estado);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.gravamenes.listar-gravamenes', [
            'gravamenes' => $gravamenes
        ]);
    }
}