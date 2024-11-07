<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        
        Schema::create('gestores', function (Blueprint $table) {
            $table->id();
            
            $table->timestamps();

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

           

        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('gestores');
    }
};
