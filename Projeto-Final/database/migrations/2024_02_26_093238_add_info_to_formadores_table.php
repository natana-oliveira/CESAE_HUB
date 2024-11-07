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
        Schema::table('formadores', function (Blueprint $table) {
            $table->string('areaAtuacao')->nullable();
            $table->string('regime')->nullable();
            $table->string('localizacao')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formadores', function (Blueprint $table) {
            $table->dropColumn('areaAtuacao');
            $table->dropColumn('regime');
            $table->dropColumn('localizacao');

        });
    }
};
