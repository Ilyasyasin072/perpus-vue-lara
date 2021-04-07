<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            'kode_anggota' => 'KN001',
            'nama_anggota' => 'abc',
            'jk_anggota' => 'L',
            'id_jurusan' => '1',
            'no_tlp_anggota' => '08545774854',
            'alamat_anggota' => 'jalan dikromo ini adlaah',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];

        $result = \DB::table('anggota')->insert($data);

    }
}
