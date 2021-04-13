<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\BukuTrait;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Rak;
use Vali;
use Carbon\Carbon;
use Image;

class BukuController extends Controller
{

    use BukuTrait;

    public function index()
    {
        return $this->indexTraits();
    }

    public function store(Request $request)
    {

        $request->validate([
            'images' => 'required' // Only allow .jpg, .bmp and .png file types.
        ]);

        try {
            $file =  $request->file('images');
            $name = '/books/' . uniqid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);

            $buku = new Buku();

                     $buku->kode_buku = $request->kode_buku;
                     $buku->judul_buku = $request->judul_buku;
                     $buku->penulis_buku =  $request->penulis_buku;
                     $buku->penerbit_buku =  $request->penerbit_buku;
                     $buku->tahun_penerbit =  $request->tahun_penerbit;
                     $buku->desc_buku =  $request->desc_buku;
                     $buku->images = $name;
                     $buku->stock = $request->stock;

                     $buku->save();

                     $rak = new Rak();

                     $rak->nama_rak = $request->nama_rak;

                     $rak->lokasi_rak = $request->lokasi_rak;

                     $rak->id_buku = $buku->id;

                     $rak->save();

                     return response()->json($buku);
        } catch (\Throwable $th) {
            //throw $th;
        }
        // try {
        //     if ($request->hasFile('file')) {

                // $request->validate([
                //     'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                // ]);

        //         $request->file->store('books', 'public');

        //         $path = $request->file->hashName();

        //         $buku = new Buku();

        //         $buku->kode_buku = $request->kode_buku;
        //         $buku->judul_buku = $request->judul_buku;
        //         $buku->penulis_buku =  $request->penulis_buku;
        //         $buku->penerbit_buku =  $request->penerbit_buku;
        //         $buku->tahun_penerbit =  $request->tahun_penerbit;
        //         $buku->desc_buku =  $request->desc;
        //         $buku->images = $path;
        //         $buku->stock = $request->stock;

        //         $buku->save();

        //         $rak = new Rak();

        //         $rak->nama_rak = $request->nama_rak;

        //         $rak->lokasi_rak = $request->lokasi_rak;

        //         $rak->id_buku = $buku->id;

        //         $rak->save();

        //         return response()->json($buku);

        //         // var_dump($request->file->hashName()); die;

        //         // return $this->storeTraits($request->all(), $path);
        //     }
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return response()->json($th->getMessage());
        // }
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
