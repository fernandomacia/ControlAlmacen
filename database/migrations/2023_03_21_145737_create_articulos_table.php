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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('departamentoId');
            $table->foreign('departamentoId')
                    ->references('id')
                    ->on('departamentos')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
            // FALTA AÑADIR EL QR
            $table->timestamps();
            $table->boolean('prestado')->default(false);
            $table->boolean('enabled')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
