<?php

namespace App\Livewire\Socios;

use Livewire\Component;
use App\Models\Socio;

class CrearSocio extends Component
{
    public $codigo_socio;
    public $tipo_documento = 'CI';
    public $numero_documento;
    public $nombres;
    public $apellidos;
    public $fecha_nacimiento;
    public $estado_civil;
    public $domicilio;
    public $telefono;
    public $email;
    public $fecha_ingreso;

    protected $rules = [
        'codigo_socio' => 'required|unique:socios',
        'tipo_documento' => 'required',
        'numero_documento' => 'required|unique:socios',
        'nombres' => 'required|min:2',
        'apellidos' => 'required|min:2',
        'fecha_ingreso' => 'required|date',
    ];

    public function save()
    {
        $this->validate();

        Socio::create([
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
            'fecha_ingreso' => $this->fecha_ingreso ?? now(),
            'estado' => 'activo',
            'created_by' => auth()->id(),
        ]);

        session()->flash('mensaje', 'Socio creado exitosamente.');
        return redirect()->route('socios.index');
    }

    public function render()
    {
        return view('livewire.socios.crear-socio');
    }
}