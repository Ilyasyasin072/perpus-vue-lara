<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\PetugasTrait;
use Illuminate\Http\Request;

class PetugasController extends Controller
{

    use PetugasTrait;

    public function index()
    {
        return $this->indexTraits();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        return $this->storeTraits($data);
    }

    public function update(Request $request) {

    }

    public function show($id)
    {
        return $this->showTraits($id);
    }

    public function destroy($id)
    {
        return $this->deleteTraits($id);
    }
}
