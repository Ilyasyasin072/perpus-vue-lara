<?php

namespace App\Http\Traits;

use App\Http\Traits\ApiResponser;
use App\Models\Rak;
use Illuminate\Http\Request;

trait RakTrait {

    use ApiResponser;

    public function indexTraits() {

        try {
            $rak = Rak::with('buku')->get();

            return $this->responseSuccess('success', $rak, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }

    }

    public function storeTraits($data) {

        try {
            $rak = new Rak($data);

            $rak->save();

            return $this->responseSuccess('success', $rak, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function updateTraits($id, $data) {

    }

    public function showTraits($id) {

        try {

            $id_ = $id;

            $rak = Rak::with("buku")->whereHas("buku",function($q) use($id_){
                $q->where("id","=",$id_);
            })->get();

            return $this->responseSuccess('success', $rak, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }

    public function deleteTraits($id) {

        try {

            $rak = Rak::find($id);

            $rak->delete();

            return $this->responseSuccess('success', $rak, 200);

        } catch (\Throwable $th) {

            return $this->responseError($th->getMessage(), 500);

        } catch (\Illuminate\Database\QueryException $ex) {

            return $this->responseError($ex->getMessage(), 500);
        }
    }
}
