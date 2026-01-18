<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    
    protected $table = 'tugas'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'id_tugas';
    
    protected $fillable = [
        'id_matakuliah', 
        'judul_tugas', 
        'deskripsi', 
        'tipe_tugas', 
        'tingkat_kesulitan', 
        'bobot_persen', 
        'tanggal_diberikan', 
        'deadline'
    ];

    public function pengerjaan_tugas() 
    {
        return $this->hasMany(PengerjaanTugas::class, 'id_tugas');
    }
}