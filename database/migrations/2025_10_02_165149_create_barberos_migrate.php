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
    Schema::create('barberos', function (Blueprint $table) {
        $table->id('Id_Barbero'); // PK personalizada
        $table->string('Nombre');
        $table->string('Apellido');
        $table->string('Email')->unique(); // email único
        $table->string('Especialidad');
        $table->timestamps(); // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barberos');
    }
};
