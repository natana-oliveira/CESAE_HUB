<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('ultimoNome');
            $table->string('email');
            $table->string('password');
            $table->integer('user_type');
            $table->string('localidade');
            $table->string('contacto');
            
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('users');

    }

};
