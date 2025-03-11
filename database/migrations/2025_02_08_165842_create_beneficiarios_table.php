<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * personas beneficiadas por las donaciones de medicina
     */
    public function up(): void
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('cedula')->unique();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('edad');
            $table->string('estado_civil');
            $table->string('tipo_sangre')->nullable();
            $table->string('enfermedades')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('alergias')->nullable();
            $table->string('id_usuario');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
