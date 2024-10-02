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
        Schema::create('retiradas', function (Blueprint $table) {
            $table->id();
            $table->string('documento');

            $table->unsignedBigInteger('interessado')->nullable();
            $table->foreign('interessado')->references('id')->on('users');

            $table->unsignedBigInteger('receptor')->nullable();
            $table->foreign('receptor')->references('id')->on('receptors');

            $table->string('atendente')->nullable();
            $table->string('aut_receptor')->nullable();
            $table->string('aut_atendente')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiradas');
    }
};
