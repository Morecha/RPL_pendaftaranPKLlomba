<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Accepted::class,
            Mahasiswa::class,
            PengajuanSeeder::class,
            Queue::class,
            instansi::class
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
