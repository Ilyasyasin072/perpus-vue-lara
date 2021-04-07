<?php

namespace App\Http\Traits;
use App\Models\Petugas;
use App\Http\Traits\ApiResponser;

trait PetugasTrait {

    use ApiResponser;

    public function indexTraits() {

        try {
            $petugas = Petugas::JsonPetugas();

            return $this->responseSuccess('success', $petugas, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }

    public function storeTraits($data) {

        try {
            $petugas = new Petugas($data);
            $petugas->save();

            return $this->responseSuccess('success', $petugas, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }

    public function showTraits($id) {

        try {
            $petugas = Petugas::find($id);

            return $this->responseSuccess('success', $petugas, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }

    public function deleteTraits($id) {

        try {
            $petugas = Petugas::find($id);

            $petugas->delete();

            return $this->responseSuccess('success', $petugas, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }
}
