<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\RakTrait;
use Illuminate\Http\Request;

class RakController extends Controller {

    use RakTrait;

    public function index() {
        return $this->indexTraits();
    }

    public function store(Request $request) {
        $data = $request->all();
        return $this->storeTraits($data);
    }
}
