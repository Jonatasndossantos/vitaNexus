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
        Schema::create('saude', function (Blueprint $table) {
            $table->id();
            $table->float('weight');
            $table->float('height');
            $table->integer('age');
            $table->string('gender');
            $table->string('activityLevel');
            $table->float('bmi');
            $table->string('bmiCategory');
            $table->float('waterIntake');
            $table->integer('calories');
            $table->json('macros'); // Para armazenar os macronutrientes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_calculations');
    }
};
