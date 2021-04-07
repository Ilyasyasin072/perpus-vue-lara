<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\PengembalianTrait;

class PengembalianController extends Controller {

    use PengembalianTrait;

    public function index() {
        return $this->indexTraits();
    }

    public function pinjaman($p) {
        return $this->storeTraits($p);
    }
}
