<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->string('dewey')->nullable();
            $table->string('isbn')->nullable()->unique();
            $table->string('ubication')->nullable();
            // Auditoría de habilitado/deshabilitado
            $table->timestamp('disabled_at')->nullable();
            $table->unsignedBigInteger('disabled_by')->nullable();
            $table->timestamp('enabled_at')->nullable();
            $table->unsignedBigInteger('enabled_by')->nullable();
            //habilitar SoftDeletes
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
