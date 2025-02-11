<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('drivers', function (Blueprint $table) {
        $table->id(); // ID único autoincremental
        $table->string('nia')->unique(); // NIA único (puedes cambiar este campo si es diferente para conductores)
        $table->string('dni')->unique(); // DNI único
        $table->string('name'); // Nombre
        $table->string('phone'); // Teléfono
        $table->string('location'); // Localidad
        $table->string('email')->unique(); // Email único
        $table->timestamps(); // Campos created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
