<?php

namespace App\Livewire\Titulos;

use Livewire\Component;
use App\Models\Titulo;
use App\Models\Socio;

class CrearTitulo extends Component
{
    public $numero_titulo;
    public $cantidad_parcelas = 0;
    public $cantidad_acciones = 0;
    public $valor_nominal;
    public $fecha_emision;
    public $id_socio_actual;
    public $observaciones;

    protected $rules = [
        'numero_titulo' => 'required|unique:titulos',
        'cantidad_parcelas' => 'required|integer|min:0',
        'cantidad_acciones' => 'required|integer|min:0',
        'fecha_emision' => 'required|date',
        'id_socio_actual' => 'required|exists:socios,id',
    ];

    public function save()
    {
        $this->validate();

        Titulo::create([
            'numero_titulo' => $this->numero_titulo,
            'cantidad_parcelas' => $this->cantidad_parcelas,
            'cantidad_acciones' => $this->cantidad_acciones,
            'valor_nominal' => $this->valor_nominal,
            'fecha_emision' => $this->fecha_emision,
            'id_socio_actual' => $this->id_socio_actual,
            'observaciones' => $this->observaciones,
            'estado' => 'activo',
            'endosos_realizados' => 0,
            'created_by' => auth()->id(),
        ]);

        session()->flash('mensaje', 'Título creado exitosamente.');
        return redirect()->route('titulos.index');
    }

    public function render()
    {
        $socios = Socio::where('estado', 'activo')->orderBy('apellidos')->get();
        return view('livewire.titulos.crear-titulo', [
            'socios' => $socios
        ]);
    }
}