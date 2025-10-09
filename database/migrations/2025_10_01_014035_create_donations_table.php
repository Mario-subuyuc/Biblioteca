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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')->nullable()->constrained('users')->onDelete('set null');// Usuario que dona
            $table->foreignId('directive_id')->constrained('users')->onDelete('cascade'); // Usuario que recibe
            $table->decimal('amount', 10, 2);
            $table->string('method', 50);
            $table->date('donation_date');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['reader_id', 'directive_id']); // índice para consultas más rápidas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
