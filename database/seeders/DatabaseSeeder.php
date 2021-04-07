<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\BukuController;
use Illuminate\Database\Seeder;
use Database\Seeders\JurusanSeed;
use Database\Seeders\AnggotaSeeder;
use Database\Seeders\BukuSeeder;
use Database\Seeders\PetugasSeeder;
use Database\Seeders\RakSeeder;
use Database\Seeders\PinjamanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // JurusanSeed::class
            // AnggotaSeeder::class
            // BukuSeeder::class
            // PetugasSeeder::class
            // RakSeeder::class,
            PinjamanSeeder::class
        ]);
    }
}
