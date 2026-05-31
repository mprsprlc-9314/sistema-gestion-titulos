<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_propietarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_titulo')->constrained('titulos');
            $table->foreignId('id_socio_anterior')->constrained('socios');
            $table->foreignId('id_socio_nuevo')->constrained('socios');
            $table->string('tipo_transferencia', 50);
            $table->integer('numero_endoso');
            $table->date('fecha_acto');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('notario_nombre', 200)->nullable();
            $table->string('notario_numero', 50)->nullable();
            $table->string('acta_notarial_numero', 100)->nullable();
            $table->boolean('es_reversion')->default(false);
            $table->foreignId('creado_por')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_propietarios');
    }
};