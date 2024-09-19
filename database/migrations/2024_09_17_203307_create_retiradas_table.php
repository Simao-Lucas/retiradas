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
            $table->integer('codpes')->nullable();
            $table->string('nome_prop')->nullable();
            $table->boolean('retirado_prop')->default(TRUE);
            $table->string('nome_rec')->nullable();
            $table->string('cpf_rec')->nullable();
            $table->integer('codpes_rec')->nullable();
            $table->boolean('login_senhaU')->default(TRUE);
            $table->string('documento');
            $table->string('secretario')->nullable();
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
