<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rak;
use App\Models\Pengembalian;
use App\Models\Pinjaman;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'penulis_buku',
        'penerbit_buku',
        'tahun_penerbit',
    ];

    protected $rules = [
        'kode_buku' => 'required|kode_buku:buku',
    ];

    public function scopeJsonBuku($query) {
        return $query->select('*')->get();
    }

    public function rak() {
        return $this->hasMany(Rak::class, 'id');
    }

    public function pengembalian() {
        return $this->hasMany(Pengembalian::class, 'id');
    }

    public function peminjaman() {
        return $this->hasMany(Pinjaman::class, 'id');
    }

}
