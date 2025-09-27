<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del material
            $table->integer('quantity')->default(0); // Cantidad disponible
            $table->boolean('donation')->default(false); // Si es donativo
            $table->string('category')->nullable(); // Tipo: insumo, mobiliario, etc.
            $table->string('unit')->nullable(); // Unidad de medida (piezas, cajas, litros)
            $table->text('description')->nullable(); // Detalles adicionales
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
