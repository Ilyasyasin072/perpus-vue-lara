<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Pengembalian;
use App\Models\Pinjaman;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    protected $fillable = [
        'kode_anggota',
        'nama_anggota',
        'jk_anggota',
        'id_jurusan',
        'no_tlp_anggota',
        'alamat_anggota'
    ];

    protected $rules = [
        'kode_anggota' => "required|unique:kode_anggota",
      ];


    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }


    public function scopeJsonAnggota($query) {
        return $query->select('*')->get();
    }

    public function pengembalian() {
        return $this->hasMany(Pengembalian::class, 'id');
    }

    public function peminjaman() {
        return $this->hasMany(Pinjaman::class, 'id');
    }
}
