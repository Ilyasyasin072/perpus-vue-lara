<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengembalian;
use App\Models\Pinjaman;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'nama_petugas',
        'jabatan_petugas',
        'no_tlp_petugas',
        'alamat_petugas',
    ];

    public function scopeJsonPetugas($query) {
        return $query->select('*')->get();
    }

    public function pengembalian() {
        return $this->hasMany(Pengembalian::class, 'id');
    }

    public function peminjaman() {
        return $this->hasMany(Pinjaman::class, 'id');
    }
}
