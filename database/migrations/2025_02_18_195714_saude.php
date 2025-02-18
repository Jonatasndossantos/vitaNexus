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
            $table->increments('id');

            $table->integer('pessoa_id')->unsigned();
            $table->foreign('pessoa_id')->references('id')->on('user');

            $table->id();
            $table->string('altura');
            $table->string('peso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
