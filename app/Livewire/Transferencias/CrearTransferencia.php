<?php

namespace App\Livewire\Transferencias;

use Livewire\Component;
use App\Models\Titulo;
use App\Models\Socio;
use App\Models\Transferencia;

class CrearTransferencia extends Component
{
    public $id_titulo;
    public $tituloSeleccionado;
    public $id_socio_cesionario;
    public $tipo_transferencia = 'venta';
    public $monto;
    public $notario_nombre;
    public $notario_numero;
    public $acta_notarial_numero;
    public $fecha_acta_notarial;

    public function updatedIdTitulo()
    {
        $this->tituloSeleccionado = Titulo::with('socioActual')->find($this->id_titulo);
    }

    protected $rules = [
        'id_titulo' => 'required|exists:titulos,id',
        'id_socio_cesionario' => 'required|exists:socios,id|different:id_socio_cedente',
        'tipo_transferencia' => 'required',
        'notario_nombre' => 'required|min:5',
        'notario_numero' => 'required',
        'acta_notarial_numero' => 'required',
        'fecha_acta_notarial' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        // Validar que el título no tenga 3 endosos
        if ($this->tituloSeleccionado->endosos_realizados >= 3) {
            session()->flash('error', 'El título ya alcanzó el límite de 3 endosos.');
            return;
        }

        // Validar que el título esté activo
        if ($this->tituloSeleccionado->estado != 'activo') {
            session()->flash('error', 'El título no está activo.');
            return;
        }

        // Validar que el cesionario no sea el dueño actual
        if ($this->id_socio_cesionario == $this->tituloSeleccionado->id_socio_actual) {
            session()->flash('error', 'El cesionario no puede ser el dueño actual.');
            return;
        }

        $nuevoEndoso = $this->tituloSeleccionado->endosos_realizados + 1;

        Transferencia::create([
            'id_titulo' => $this->id_titulo,
            'id_socio_cedente' => $this->tituloSeleccionado->id_socio_actual,
            'id_socio_cesionario' => $this->id_socio_cesionario,
            'tipo_transferencia' => $this->tipo_transferencia,
            'numero_endoso' => $nuevoEndoso,
            'monto' => $this->monto,
            'notario_nombre' => $this->notario_nombre,
            'notario_numero' => $this->notario_numero,
            'acta_notarial_numero' => $this->acta_notarial_numero,
            'fecha_acta_notarial' => $this->fecha_acta_notarial,
            'estado' => 'completada',
            'fecha_efectiva' => now(),
            'creado_por' => auth()->id(),
        ]);

        // Actualizar título
        $this->tituloSeleccionado->update([
            'id_socio_actual' => $this->id_socio_cesionario,
            'endosos_realizados' => $nuevoEndoso,
            'estado' => $nuevoEndoso >= 3 ? 'bloqueado' : 'activo',
        ]);

        session()->flash('mensaje', 'Transferencia completada exitosamente.');
        return redirect()->route('transferencias.index');
    }

    public function render()
    {
        $titulos = Titulo::where('estado', 'activo')
            ->where('endosos_realizados', '<', 3)
            ->with('socioActual')
            ->get();
        $socios = Socio::where('estado', 'activo')->orderBy('apellidos')->get();

        return view('livewire.transferencias.crear-transferencia', [
            'titulos' => $titulos,
            'socios' => $socios
        ]);
    }
}