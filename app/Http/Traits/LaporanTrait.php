<?php

namespace App\Http\Traits;

use App\Models\Pengembalian;
use App\Models\Pinjaman;
use Illuminate\Http\Request;

trait LaporanTrait
{

    public function indexTraits()
    {
        $peminjaman = Pinjaman::with(['buku', 'anggota', 'petugas'])->get();
        $pengembalian = Pengembalian::with('buku', 'anggota', 'petugas')->get();

        return response()->json([
            'peminjaman' => $peminjaman,
            'pengembalian' => $pengembalian
        ]);
    }
}
