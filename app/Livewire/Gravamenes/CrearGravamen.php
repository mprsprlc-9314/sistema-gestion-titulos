<?php

namespace App\Livewire\Gravamenes;

use Livewire\Component;
use App\Models\Titulo;
use App\Models\Gravamen;

class CrearGravamen extends Component
{
    public $id_titulo;
    public $tipo = 'embargo';
    public $fecha_inicio;
    public $fecha_fin;
    public $monto;
    public $entidad;
    public $numero_expediente;
    public $juzgado;

    protected $rules = [
        'id_titulo' => 'required|exists:titulos,id',
        'tipo' => 'required',
        'fecha_inicio' => 'required|date',
        'entidad' => 'required',
    ];

    public function save()
    {
        $this->validate();

        Gravamen::create([
            'id_titulo' => $this->id_titulo,
            'tipo' => $this->tipo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'monto' => $this->monto,
            'entidad' => $this->entidad,
            'numero_expediente' => $this->numero_expediente,
            'juzgado' => $this->juzgado,
            'estado' => 'activo',
            'registrado_por' => auth()->id(),
        ]);

        session()->flash('mensaje', 'Gravamen registrado exitosamente.');
        return redirect()->route('gravamenes.index');
    }

    public function render()
    {
        $titulos = Titulo::orderBy('numero_titulo')->get();
        return view('livewire.gravamenes.crear-gravamen', [
            'titulos' => $titulos
        ]);
    }
}