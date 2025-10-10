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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            // Relación con usuarios existentes (nullable si es nuevo)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');

            // Datos de persona nueva
            $table->string('name')->nullable();
            $table->enum('gender', ['masculino', 'femenino', 'otro']);
            $table->date('birth_date');

            // Acceso a internet
            $table->boolean('internet_access');

            // Uso del equipo, guardado como JSON
             $table->string('usage_purpose');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
