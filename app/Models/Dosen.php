<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MataKuliah;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = ['nidn', 'nama_dosen', 'email'];

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
