<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_buku' => 'BK002',
                'judul_buku' => 'lorem',
                'penulis_buku' => 'lorem',
                'penerbit_buku' => 'lorem',
                'tahun_penerbit' => 'lorem',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ]
            ];

        return DB::table('buku')->insert($data);
    }
}
