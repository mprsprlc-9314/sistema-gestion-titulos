<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'codigo_socio',
        'tipo_documento',
        'numero_documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'estado_civil',
        'domicilio',
        'telefono',
        'email',
        'fecha_ingreso',
        'fecha_egreso',
        'estado',
        'observaciones',
        'created_by',
        'updated_by',
    ];
}