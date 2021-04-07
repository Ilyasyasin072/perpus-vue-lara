<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\LaporanTrait;

class LaporanController extends Controller
{
    use LaporanTrait;

    public function index(Request $request) {
        return $this->indexTraits();
    }
}
