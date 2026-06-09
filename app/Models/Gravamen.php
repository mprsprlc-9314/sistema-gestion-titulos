<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gravamen extends Model
{
    use HasFactory;

    protected $table = 'gravamenes';

    protected $fillable = [
        'id_titulo',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'monto',
        'entidad',
        'numero_expediente',
        'juzgado',
        'estado',
        'registrado_por',
        'levantado_por',
        'fecha_levantamiento',
        'motivo_levantamiento',
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class, 'id_titulo');
    }
}