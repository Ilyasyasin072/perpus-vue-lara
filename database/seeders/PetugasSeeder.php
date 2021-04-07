<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nama_petugas' => 'Lorem',
            'jabatan_petugas' => 'PETUGAS PERPUS',
            'no_tlp_petugas' => '088457947',
            'alamat_petugas' => 'jalan Joyo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        return DB::table('petugas')->insert($data);
    }
}
