<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dividendos', function (Blueprint $table) {
            $table->id();
            $table->string('periodo', 7);
            $table->date('fecha_declaracion');
            $table->date('fecha_pago')->nullable();
            $table->string('tipo', 20)->default('efectivo');
            $table->decimal('monto_por_accion', 10, 4);
            $table->decimal('monto_total_distribuido', 15, 2);
            $table->string('estado', 20)->default('declarado');
            $table->foreignId('creado_por')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dividendos');
    }
};