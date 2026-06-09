<?php

namespace App\Livewire\Titulos;

use Livewire\Component;
use App\Models\Titulo;
use App\Models\Socio;

class EditarTitulo extends Component
{
    public $titulo;
    public $numero_titulo;
    public $cantidad_parcelas;
    public $cantidad_acciones;
    public $valor_nominal;
    public $fecha_emision;
    public $id_socio_actual;
    public $estado;
    public $observaciones;

    public function mount($id)
    {
        $this->titulo = Titulo::findOrFail($id);
        $this->numero_titulo = $this->titulo->numero_titulo;
        $this->cantidad_parcelas = $this->titulo->cantidad_parcelas;
        $this->cantidad_acciones = $this->titulo->cantidad_acciones;
        $this->valor_nominal = $this->titulo->valor_nominal;
        $this->fecha_emision = $this->titulo->fecha_emision;
        $this->id_socio_actual = $this->titulo->id_socio_actual;
        $this->estado = $this->titulo->estado;
        $this->observaciones = $this->titulo->observaciones;
    }

    protected $rules = [
        'numero_titulo' => 'required',
        'cantidad_parcelas' => 'required|integer|min:0',
        'cantidad_acciones' => 'required|integer|min:0',
        'fecha_emision' => 'required|date',
        'id_socio_actual' => 'required|exists:socios,id',
    ];

    public function save()
    {
        $this->validate();

        $this->titulo->update([
            'numero_titulo' => $this->numero_titulo,
            'cantidad_parcelas' => $this->cantidad_parcelas,
            'cantidad_acciones' => $this->cantidad_acciones,
            'valor_nominal' => $this->valor_nominal,
            'fecha_emision' => $this->fecha_emision,
            'id_socio_actual' => $this->id_socio_actual,
            'estado' => $this->estado,
            'observaciones' => $this->observaciones,
            'updated_by' => auth()->id(),
        ]);

        session()->flash('mensaje', 'Título actualizado exitosamente.');
        return redirect()->route('titulos.show', $this->titulo->id);
    }

    public function render()
    {
        $socios = Socio::where('estado', 'activo')->orderBy('apellidos')->get();
        return view('livewire.titulos.editar-titulo', [
            'socios' => $socios
        ]);
    }
}