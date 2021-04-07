<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class JurusanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            [
                'nama_jurusan' => 'TEKNIK INFORMATIKA',
                'prodi' => 'D4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'nama_jurusan' => 'MANAGEMENT PEMASARAN',
                'prodi' => 'D4',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];


        $data = DB::table('jurusan')->insert($jurusan);

        return $data;
    }
}
