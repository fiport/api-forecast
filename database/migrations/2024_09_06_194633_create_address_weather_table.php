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
        Schema::create('address_weather', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')
                ->constrained('addresses_consulted')
                ->onDelete('cascade');
            $table->foreignId('weather_id')
                ->constrained('weather')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_weather');
    }
};
