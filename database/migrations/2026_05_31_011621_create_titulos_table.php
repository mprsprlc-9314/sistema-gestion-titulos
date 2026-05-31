<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('titulos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_titulo', 50)->unique();
            $table->integer('cantidad_parcelas')->default(0);
            $table->integer('cantidad_acciones')->default(0);
            $table->decimal('valor_nominal', 15, 2)->nullable();
            $table->date('fecha_emision');
            $table->string('estado', 20)->default('activo');
            $table->integer('endosos_realizados')->default(0);
            $table->foreignId('id_socio_actual')->constrained('socios');
            $table->text('observaciones')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('titulos');
    }
};