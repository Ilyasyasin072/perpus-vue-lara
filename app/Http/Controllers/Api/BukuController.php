<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Traits\BukuTrait;
use Illuminate\Http\Request;

class BukuController extends Controller {

    use BukuTrait;

    public function index() {
        return $this->indexTraits();
    }

    public function store(Request $request) {
        return $this->storeTraits($request->all());
    }

    public function update(Request $request, $id) {
        $buku = $request->all();
        return $this->updateTraits($id, $buku);
    }

    public function show($id) {
        return $this->showTraits($id);
    }

    public function destroy($id) {
        return $this->deleteTraits($id);
    }

}
