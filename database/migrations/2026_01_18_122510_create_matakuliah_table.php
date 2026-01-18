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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->bigIncrements('id_matakuliah');
            $table->unsignedBigInteger('id_dosen'); 
            $table->string('kode_mk', 20)->unique();
            $table->string('nama_mk', 100);
            $table->integer('sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
