<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_titulo',
        'cantidad_parcelas',
        'cantidad_acciones',
        'valor_nominal',
        'fecha_emision',
        'estado',
        'endosos_realizados',
        'id_socio_actual',
        'observaciones',
        'created_by',
        'updated_by',
    ];

    public function socioActual()
    {
        return $this->belongsTo(Socio::class, 'id_socio_actual');
    }
}