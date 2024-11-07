<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modulos_formadores', function (Blueprint $table) {
            

            $table->unsignedBigInteger('modulos_id');
            $table->foreign('modulos_id')->references('id')->on('modulos');

	    $table->unsignedBigInteger('formadores_id');
            $table->foreign('formadores_id')->references('id')->on('formadores');
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('modulos_formadores');

    }

};
