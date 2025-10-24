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
        Schema::create('Cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->char('sexo',1);
            $table->date('data_nascimento');
            $table->string('RG',12)->nullable();
            $table->string('CPF',14);
            // $table->timestamps();//quando um dado é adsicionado a tabela
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cliente');
    }
};
