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
        Schema::create('materialtoteachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacherId')->nullable();
            $table->foreign('teacherId')->references('id')->on('teachers');            
            $table->unsignedBigInteger('materialId')->nullable();
            $table->foreign('materialId')->references('id')->on('materials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialtoteachers');
    }
};
