<?php

namespace App\Http\Traits;

use App\Models\Anggota;
use App\Http\Traits\ApiResponser;
use Illuminate\Http\Request;

trait AnggotaTrait
{

    use ApiResponser;

    public function indexTraits()
    {

        try {

            $anggota = Anggota::with('jurusan')->get();

            return $this->responseSuccess('success', $anggota, 200);
        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);
        }
    }

    public function checkTraits ($kode_anggota) {
        $anggota = Anggota::where('kode_anggota', $kode_anggota)->get();
        return $anggota;
    }

    public function storeTraits($data)
    {

        $anggota = new Anggota($data);

        try {

            $anggota->save();

            return $this->responseSuccess('success', $anggota, 200);
        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function showTraits($id)
    {
        $anggota = Anggota::with('jurusan')->where('id', $id)->get();

        try {

            return $this->responseSuccess('success', $anggota, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function updateTraits($id, $data) {

        $anggota = Anggota::find($id);

        $anggota->kode_anggota = $data['kode_anggota'];
        $anggota->nama_anggota = $data['nama_anggota'];
        $anggota->jk_anggota = $data['jk_anggota'];
        $anggota->id_jurusan = $data['id_jurusan'];
        $anggota->no_tlp_anggota = $data['no_tlp_anggota'];
        $anggota->alamat_anggota = $data['alamat_anggota'];

        try {

            $anggota->save();

            return $this->responseSuccess('success', $anggota, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function deleteTraits($id) {

        $anggota = Anggota::find($id);

        try {

            $anggota->delete();

            return $this->responseSuccess('success', $anggota, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }
}
