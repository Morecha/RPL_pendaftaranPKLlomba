<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuans')->insert([
            'id_user'=>'1',
            'awal_pelaksanaan'=>'021222',
            'akhir_pelaksanaan'=>'091222',
            'tahap'=>'3',
            'status'=>'Finish',
        ]);

        DB::table('pengajuans')->insert([
            'id_user'=>'2',
            'awal_pelaksanaan'=>'251021',
            'akhir_pelaksanaan'=>'250222',
            'tahap'=>'4',
            'status'=>'Finish',
        ]);

    }
}
