<?php

namespace App\Http\Traits;
use App\Models\Buku;
use App\Http\Traits\ApiResponser;

trait BukuTrait {

    use ApiResponser;

    public function indexTraits() {

        try {
            $buku = Buku::JsonBuku();

            return $this->responseSuccess('success', $buku, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function storeTraits($data) {

        $buku = new Buku($data);

        try {

            $buku->save();

            return $this->responseSuccess('success', $buku, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }


    public function updateTraits($id, $data) {


        $buku = Buku::find($id);

        $buku->kode_buku = $data['kode_buku'];
        $buku->judul_buku = $data['judul_buku'];
        $buku->penulis_buku = $data['penulis_buku'];
        $buku->penulis_buku = $data['penulis_buku'];
        $buku->tahun_penerbit = $data['tahun_penerbit'];

        try {

            $buku->save();

            return $this->responseSuccess('success', $buku, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }

    public function showTraits($id) {

        try {

            $buku = Buku::find($id);

            return $this->responseSuccess('success', $buku, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function deleteTraits($id) {

        try {

            $buku = Buku::find($id);

            $buku->delete();

            return $this->responseSuccess('success', $buku, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }
}