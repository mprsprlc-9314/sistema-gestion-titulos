<?php

namespace App\Livewire\Transferencias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transferencia;

class ListarTransferencias extends Component
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
        $transferencias = Transferencia::query()
            ->with(['titulo', 'socioCedente', 'socioCesionario'])
            ->when($this->buscar, function ($query) {
                $query->whereHas('titulo', function ($q) {
                    $q->where('numero_titulo', 'like', '%' . $this->buscar . '%');
                })->orWhereHas('socioCedente', function ($q) {
                    $q->where('nombres', 'like', '%' . $this->buscar . '%')
                      ->orWhere('apellidos', 'like', '%' . $this->buscar . '%');
                });
            })
            ->when($this->estado, function ($query) {
                $query->where('estado', $this->estado);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.transferencias.listar-transferencias', [
            'transferencias' => $transferencias
        ]);
    }
}