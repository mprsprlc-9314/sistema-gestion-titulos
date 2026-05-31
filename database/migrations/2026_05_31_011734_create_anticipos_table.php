<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anticipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_socio')->constrained('socios');
            $table->foreignId('id_titulo_garantia')->constrained('titulos');
            $table->decimal('monto_solicitado', 15, 2);
            $table->decimal('monto_aprobado', 15, 2)->nullable();
            $table->decimal('tasa_interes_anual', 5, 2)->nullable();
            $table->integer('plazo_meses')->nullable();
            $table->decimal('cuota_mensual', 15, 2)->nullable();
            $table->decimal('saldo_pendiente', 15, 2)->nullable();
            $table->date('fecha_solicitud');
            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_primer_vencimiento')->nullable();
            $table->date('fecha_ultimo_vencimiento')->nullable();
            $table->string('estado', 30)->default('solicitado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anticipos');
    }
};