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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('userId')
                    ->constrained('users')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            $table->foreignId('articuloId')
                    ->constrained('articulos')
                    ->on('articulos')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
