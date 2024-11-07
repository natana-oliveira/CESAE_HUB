<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->integer('nr_alunos');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('codigo');
            
            $table->timestamps();

	   $table->unsignedBigInteger('cursos_id');
            $table->foreign('cursos_id')->references('id')->on('cursos');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
