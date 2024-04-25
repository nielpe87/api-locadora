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
        Schema::create('categoria_filme', function (Blueprint $table) {
            $table->unsignedBigInteger("categoria_id");
            $table->unsignedBigInteger("filme_id");

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('filme_id')->references('id')->on('filmes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_filme');
    }
};
