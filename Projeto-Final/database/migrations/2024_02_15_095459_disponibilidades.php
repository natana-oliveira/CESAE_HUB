<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();
            $table->date('data_inicio');
            $table->string('periodo');
            $table->string('disponibilidades');
            
            $table->timestamps();

	    $table->unsignedBigInteger('formadores_id');
            $table->foreign('formadores_id')->references('id')->on('formadores');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('disponibilidades');

    }
};
