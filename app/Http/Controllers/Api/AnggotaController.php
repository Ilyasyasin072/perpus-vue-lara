<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\AnggotaTrait;

class AnggotaController extends Controller
{
    use AnggotaTrait;


    public function index() {
        return $this->indexTraits();
    }

    public function store(Request $request) {
        return $this->storeTraits($request->all());
    }

    public function show($id) {
        return $this->showTraits($id);
    }

    public function update(Request $request, $id) {
        $anggota = $request->all();
        return $this->updateTraits($id, $anggota);
    }

    public function destroy($id) {
        return $this->deleteTraits($id);
    }
}
