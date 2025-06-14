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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('ubicacion');
            $table->string('foto')->nullable(); // Hacer el campo foto opcional
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Eliminar la restricción de clave foránea primero
        });
        
        Schema::dropIfExists('reportes');
    }
};