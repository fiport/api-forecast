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
        Schema::create('addresses_consulted', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 9);
            $table->string('logradouro', 100)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('unidade', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('localidade', 100)->nullable();
            $table->string('uf', 5)->nullable();
            $table->string('estado', 100)->nullable();
            $table->string('regiao', 15)->nullable();
            $table->string('ibge', 15)->nullable();
            $table->string('gia', 15)->nullable();
            $table->string('ddd', 5)->nullable();
            $table->string('siafi', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
