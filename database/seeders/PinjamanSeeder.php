<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('peminjaman')->insert([
            'tanggal_pinjam' => '2021-04-06 00:00:00',
            'tanggal_kembali' => '2021-04-06 00:00:00',
            'id_buku' => '1',
            'id_anggota' => '1',
            'id_petugas' => '1',
        ]);
    }
}
