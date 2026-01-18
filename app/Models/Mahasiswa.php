<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Krs;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama'
    ];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}
