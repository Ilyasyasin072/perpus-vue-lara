<?php

namespace App\Http\Traits;

use App\Models\Pinjaman;
use App\Http\Traits\ApiResponser;


trait PeminjamanTrait
{
    use ApiResponser;

    public function indexTraits()
    {

        try {
            $pengembalian = Pinjaman::with(['buku', 'petugas', 'anggota'])->get();
            return $this->responseSuccess('success', $pengembalian, 200);
        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);
        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }
}
