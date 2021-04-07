<?php

namespace App\Http\Traits;

use App\Models\Pengembalian;
use App\Http\Traits\ApiResponser;
use App\Models\Pinjaman;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait PengembalianTrait
{
    use ApiResponser;

    public function indexTraits()
    {
        try {
            $pengembalian = Pengembalian::with(['buku', 'petugas', 'anggota'])->get();
            return $this->responseSuccess('success', $pengembalian, 200);
        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);
        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function storeTraits($p)
    {

        $pinjam = Pinjaman::with(['anggota' => function ($query) use ($p) {
            $query->where('kode_anggota', $p);
        }])->get();

        $pengembalian = Pengembalian::with(['anggota' => function ($query) use ($p) {
            $query->where('kode_anggota', $p);
        }])->get();

        $denda = 1000;

        $check_ = Carbon::parse($pinjam[0]->tanggal_kembali);
        $check_kembali = (Carbon::parse($pengembalian[0]->tanggal_pengembalian) ? Carbon::parse($pengembalian[0]->tanggal_pengembalian) : Carbon::now()->format('Y-m-d') );

        $length = $check_->diffInDays($check_kembali);

        $dendaTotal = $denda * $length;

        return response()->json([
            'peminjaman' => $pinjam,
            'pengembalian' => $pengembalian,
            'total_denda'  =>  $dendaTotal
        ]);
    }
}
