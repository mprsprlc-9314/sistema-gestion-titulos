<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_titulo',
        'id_socio_cedente',
        'id_socio_cesionario',
        'tipo_transferencia',
        'numero_endoso',
        'monto',
        'moneda',
        'notario_nombre',
        'notario_numero',
        'acta_notarial_numero',
        'fecha_acta_notarial',
        'estado',
        'creado_por',
        'verificado_por',
        'aprobado_por',
        'fecha_verificacion',
        'fecha_aprobacion',
        'fecha_efectiva',
        'observaciones',
    ];

    public function titulo()
    {
        return $this->belongsTo(Titulo::class, 'id_titulo');
    }

    public function socioCedente()
    {
        return $this->belongsTo(Socio::class, 'id_socio_cedente');
    }

    public function socioCesionario()
    {
        return $this->belongsTo(Socio::class, 'id_socio_cesionario');
    }
}