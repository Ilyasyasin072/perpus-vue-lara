<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\PeminjamanTrait;

class PeminjamanController extends Controller {

    use PeminjamanTrait;

    public function index() {
        return $this->indexTraits();
    }
}
