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
        Schema::create('weather_current', function (Blueprint $table) {
            $table->id();
            $table->string('observation_time');
            $table->integer('temperature');
            $table->integer('weather_code');
            $table->json('weather_icons');
            $table->json('weather_descriptions');
            $table->integer('wind_speed');
            $table->integer('wind_degree');
            $table->string('wind_dir');
            $table->integer('pressure');
            $table->integer('precip');
            $table->integer('humidity');
            $table->integer('cloudcover');
            $table->integer('feelslike');
            $table->integer('uv_index');
            $table->integer('visibility');
            $table->string('is_day');
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
        Schema::dropIfExists('weather_current');
    }
};
