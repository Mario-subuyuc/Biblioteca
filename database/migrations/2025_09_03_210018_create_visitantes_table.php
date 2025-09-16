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
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion')->nullable();
            $table->integer('anio_nacimiento')->nullable();
            $table->enum('sexo', ['Masculino', 'Femenino', 'Otro'])->nullable();
            $table->string('etnia')->nullable();
            $table->string('ocupacion')->nullable();
            $table->date('fecha_visita');
            $table->string('motivo_visita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitantes');
    }
};
