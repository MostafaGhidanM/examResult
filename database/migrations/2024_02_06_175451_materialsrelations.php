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
        /* Schema::create('materials', function (Blueprint $table){
            $table->foreign('studyyearId')->references('id')->on('studyyear');
            $table->foreign('gradeId')->references('id')->on('grade');
        }); */
        Schema::table('materials', function (Blueprint $table) {
            $table->string('anyyy');
            /* $table->foreign('studyyearId')
                    ->references('id')
                    ->on('studyyears')
                    ->onDelete('cascade');
            $table->foreign('gradeId')
                    ->references('id')
                    ->on('grades')
                    ->onDelete('cascade') */;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
