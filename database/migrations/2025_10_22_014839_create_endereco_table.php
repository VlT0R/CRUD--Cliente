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
        Schema::create('Endereco', function (Blueprint $table) {
            $table->id();
            $table->string('rua',150);
            $table->string('numero',15);
            $table->string('bairro',150);
            $table->string('cidade',150);
            $table->string('estado',2)
                  ->comment('Abreviação do estado Ex: SP, MG , RJ, BH ....');
            $table->string('CEP',9);
            $table->text('observacao') 
                  ->nullable()
                  ->comment('Ex: Casa marrom, Portão de grade , Etc...');
            $table->text('endereco_completo') 
                  ->virtualAs("
                                CONCAT(
                                    'Rua: ', rua,
                                    ', Nº: ', numero,
                                    ' - Bairro: ', bairro,
                                    ', Cidade: ', cidade,
                                    ' - ', estado,
                                    ', CEP: ', cep
                                )
                            ");

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Endereco');
    }
};
