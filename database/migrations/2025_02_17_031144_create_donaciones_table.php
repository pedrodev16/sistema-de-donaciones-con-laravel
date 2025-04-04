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
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiario_id')->constrained()->onDelete('cascade');
            $table->foreignId('id_usuario')
                ->nullable() // Permite valores nulos en caso de eliminar el beneficiario
                ->constrained('users')
                ->onDelete('set null');


            $table->string('descripcion')->nullable();
            $table->integer('cantidad');
            $table->json('medicinas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
