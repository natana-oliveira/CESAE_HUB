<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formadores', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('modulos_id');
            $table->foreign('modulos_id')->references('id')->on('modulos');

        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('formadores');

    }
};
