<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\BukuTrait;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{

    use BukuTrait;

    public function index()
    {
        return $this->indexTraits();
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->file->store('books', 'public');

            $path = $request->file->hashName();

            $buku = new Buku();

            $buku->kode_buku = $request->kode_buku;
            $buku->judul_buku = $request->judul_buku;
            $buku->penulis_buku =  $request->penulis_buku;
            $buku->penerbit_buku =  $request->penerbit_buku;
            $buku->tahun_penerbit =  $request->tahun_penerbit;
            $buku->img =  $path;

            $buku->save();

            return response()->json($buku);

            // var_dump($request->file->hashName()); die;

            // return $this->storeTraits($request->all(), $path);
        }
    }

    public function update(Request $request, $id)
    {
        $buku = $request->all();
        return $this->updateTraits($id, $buku);
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
