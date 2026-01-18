<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengerjaanTugas extends Model
{
    use HasFactory;
    protected $table = 'pengerjaan_tugas';
    protected $primaryKey = 'id_pengerjaan';
    protected $fillable = [
        'id_mahasiswa', 
        'id_tugas', 
        'status', 
        'nilai', 
        'estimasi_jam', 
        'waktu_mulai', 
        'waktu_selesai'
    ];
    
    public function tugas() {
        return $this->belongsTo(Tugas::class, 'id_tugas', 'id_tugas');
    }

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
