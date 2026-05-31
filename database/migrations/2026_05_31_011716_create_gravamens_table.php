<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gravamenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_titulo')->constrained('titulos');
            $table->string('tipo', 50);
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->decimal('monto', 15, 2)->nullable();
            $table->string('entidad', 200)->nullable();
            $table->string('numero_expediente', 100)->nullable();
            $table->string('juzgado', 200)->nullable();
            $table->string('estado', 30)->default('activo');
            $table->foreignId('registrado_por')->nullable()->constrained('users');
            $table->foreignId('levantado_por')->nullable()->constrained('users');
            $table->date('fecha_levantamiento')->nullable();
            $table->text('motivo_levantamiento')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gravamenes');
    }
};