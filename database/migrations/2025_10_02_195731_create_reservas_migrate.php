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
        Schema::create('reservas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('Id_Reserva');
            $table->unsignedBigInteger('Id_Cliente');
            $table->unsignedBigInteger('Id_Barbero');
            $table->dateTime('FechaHora');
            $table->enum('Estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            $table->timestamps();

            $table->foreign('Id_Cliente')->references('Id_Cliente')->on('clientes')->onDelete('cascade');
            $table->foreign('Id_Barbero')->references('Id_Barbero')->on('barberos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
