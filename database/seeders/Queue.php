<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Queue extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('queues')->insert([
            'nama_lomba'=>'HackerRank',
            'tanggal_pelaksanaan'=>'101122',
            'jenjang_pelaksanaan'=>'International',
            'id_user'=>'1',
            'status'=>'Process',
            'rank'=>'1st place',
            'data'=>'Susah.pdf'
        ]);
    }
}
