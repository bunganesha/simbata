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
        Schema::create('pengerjaan_tugas', function (Blueprint $table) {
            $table->bigIncrements('id_pengerjaan');
            
            // 1. Pastikan menggunakan unsignedBigInteger agar cocok dengan id default Laravel
            $table->unsignedBigInteger('id_tugas');
            $table->unsignedBigInteger('id_mahasiswa');
            
            $table->string('file_path')->nullable();
            $table->enum('status', ['belum', 'proses', 'selesai'])->default('belum');
            $table->decimal('nilai', 5, 2)->nullable();
            $table->timestamps();

            // 2. Perbaikan Nama Tabel: Ganti 'user' menjadi 'users'
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa') // <--- Pastikan ada huruf 's' di belakang
                ->onDelete('cascade');

            // 3. Pastikan referensi tabel tugas juga benar
            $table->foreign('id_tugas')
                ->references('id_tugas')
                ->on('tugas')
                ->onDelete('cascade');
        });                                                         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengerjaan_tugas');
    }
};
