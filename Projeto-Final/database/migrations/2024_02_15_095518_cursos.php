<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('localidade');
            $table->integer('duracao_horas');
            $table->string('regime');
	    $table->string('area');
	    $table->string('tipoFormacao');
            $table->timestamps();

		 $table->unsignedBigInteger('gestores_id');
            $table->foreign('gestores_id')->references('id')->on('gestores');
            
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('cursos');

    }
};
