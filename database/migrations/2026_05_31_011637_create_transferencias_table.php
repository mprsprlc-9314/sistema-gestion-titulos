<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_titulo')->constrained('titulos');
            $table->foreignId('id_socio_cedente')->constrained('socios');
            $table->foreignId('id_socio_cesionario')->constrained('socios');
            $table->string('tipo_transferencia', 50);
            $table->integer('numero_endoso');
            $table->decimal('monto', 15, 2)->nullable();
            $table->string('moneda', 3)->default('BOB');
            $table->string('notario_nombre', 200)->nullable();
            $table->string('notario_numero', 50)->nullable();
            $table->string('acta_notarial_numero', 100)->nullable();
            $table->date('fecha_acta_notarial')->nullable();
            $table->string('estado', 30)->default('pendiente_creacion');
            $table->foreignId('creado_por')->nullable()->constrained('users');
            $table->foreignId('verificado_por')->nullable()->constrained('users');
            $table->foreignId('aprobado_por')->nullable()->constrained('users');
            $table->timestamp('fecha_verificacion')->nullable();
            $table->timestamp('fecha_aprobacion')->nullable();
            $table->timestamp('fecha_efectiva')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transferencias');
    }
};