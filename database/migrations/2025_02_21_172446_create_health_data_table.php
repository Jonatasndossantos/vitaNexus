<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('health_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 5, 2);
            $table->integer('height');
            $table->integer('age');
            $table->string('gender');
            $table->integer('sistolica')->nullable();
            $table->integer('diastolica')->nullable();
            $table->boolean('tabagismo')->default(false);
            $table->boolean('alcoolismo')->default(false);
            $table->boolean('alimentacao_nao_saudavel')->default(false);
            $table->boolean('estresse_cronico')->default(false);
            $table->boolean('drogas_ilicitas')->default(false);
            $table->boolean('insonia')->default(false);
            $table->string('activity_level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_data');
    }
};