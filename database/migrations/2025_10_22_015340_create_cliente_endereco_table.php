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
        Schema::create('Cliente_Endereco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_endereco');
            $table->foreign('id_cliente') 
                  -> references('id')
                  ->on('Cliente')
                  ->onDelete('cascade');// se o cliente for deletado toda a relação com o mesmo será deletada
            $table->foreign('id_endereco')
                  -> references('id')
                  ->on('Endereco')
                  ->onDelete('cascade');// se o endereço for deletado toda a relação com o mesmo será deletada
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cliente_Endereco');
    }
};
