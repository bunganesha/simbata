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
        Schema::create('tugas', function (Blueprint $table) {
            $table->bigIncrements('id_tugas');
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('judul_tugas', 150);
            $table->text('deskripsi')->nullable();
            $table->enum('tipe_tugas', ['individu', 'kelompok']);
            $table->enum('tingkat_kesulitan', ['ringan', 'sedang', 'berat']);
            $table->decimal('bobot_persen', 5, 2);
            $table->date('tanggal_diberikan');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
