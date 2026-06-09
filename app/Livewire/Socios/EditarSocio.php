<?php

namespace App\Livewire\Socios;

use Livewire\Component;
use App\Models\Socio;

class EditarSocio extends Component
{
    public $socio;
    public $codigo_socio;
    public $tipo_documento;
    public $numero_documento;
    public $nombres;
    public $apellidos;
    public $fecha_nacimiento;
    public $estado_civil;
    public $domicilio;
    public $telefono;
    public $email;
    public $fecha_ingreso;
    public $estado;

    public function mount($id)
    {
        $this->socio = Socio::findOrFail($id);
        $this->codigo_socio = $this->socio->codigo_socio;
        $this->tipo_documento = $this->socio->tipo_documento;
        $this->numero_documento = $this->socio->numero_documento;
        $this->nombres = $this->socio->nombres;
        $this->apellidos = $this->socio->apellidos;
        $this->fecha_nacimiento = $this->socio->fecha_nacimiento;
        $this->estado_civil = $this->socio->estado_civil;
        $this->domicilio = $this->socio->domicilio;
        $this->telefono = $this->socio->telefono;
        $this->email = $this->socio->email;
        $this->fecha_ingreso = $this->socio->fecha_ingreso;
        $this->estado = $this->socio->estado;
    }

    protected $rules = [
        'codigo_socio' => 'required',
        'tipo_documento' => 'required',
        'numero_documento' => 'required',
        'nombres' => 'required|min:2',
        'apellidos' => 'required|min:2',
        'fecha_ingreso' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        $this->socio->update([
            'codigo_socio' => $this->codigo_socio,
            'tipo_documento' => $this->tipo_documento,
            'numero_documento' => $this->numero_documento,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'estado_civil' => $this->estado_civil,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'fecha_ingreso' => $this->fecha_ingreso,
            'estado' => $this->estado,
            'updated_by' => auth()->id(),
        ]);

        session()->flash('mensaje', 'Socio actualizado exitosamente.');
        return redirect()->route('socios.show', $this->socio->id);
    }

    public function render()
    {
        return view('livewire.socios.editar-socio');
    }
}