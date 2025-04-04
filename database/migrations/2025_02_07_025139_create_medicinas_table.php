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
        Schema::create('medicinas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipo_dosis')->nullable();
            $table->string('dosis')->nullable();
            $table->string('codigo_de_barras');
            $table->date('fecha_vencimiento');
            $table->string('descripcion');
            $table->string('tipo');
            $table->string('presentacion');
            $table->string('laboratorio');
            $table->foreignId('id_usuario')
                ->nullable() // Permite valores nulos en caso de eliminar el beneficiario
                ->constrained('users')
                ->onDelete('set null');
            $table->timestamps();
        });
    }
    // nombre, descripcion, tipo, presentacion, laboratorio
    /**
     *
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicinas');
    }
};
