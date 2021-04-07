<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillabel = [
        'nama_jurusan',
        'prodi'
    ];

    public function anggota() {
        return $this->hasMany(Anggota::class, 'id');
    }
}
