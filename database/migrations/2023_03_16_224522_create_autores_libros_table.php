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
        Schema::create('autores_libros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',90);
            $table->unsignedBigInteger('autor_libro_id');
            $table->foreign('autor_libro_id')->references('id')->on('autores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autores_libros');
    }
};
