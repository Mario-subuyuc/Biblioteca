<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reader_id')->constrained('readers')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->date('loan_date');
            $table->date('return_date')->nullable();
            $table->enum('status', ['activo', 'atrasado', 'devuelto', 'disponible'])->default('disponible');
            $table->softDeletes(); // <-- deleted_at
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
