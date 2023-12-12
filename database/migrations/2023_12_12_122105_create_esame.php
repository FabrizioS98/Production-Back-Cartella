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
        Schema::create('esame', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descrizione');
            $table->unsignedBigInteger('id_dottore');
            $table->unsignedBigInteger('id_paziente');
            $table->foreign('id_dottore')->references('id')->on('dottori');
            $table->foreign('id_paziente')->references('id')->on('pazienti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esame');
    }
};
