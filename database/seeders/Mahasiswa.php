<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'nama'=>'Ahmad',
            'nim'=>'225150209111013',
            'angkatan'=>'2022',
            'sks'=>'120',
        ]);

        DB::table('mahasiswas')->insert([
            'nama'=>'Madda Iknajah',
            'nim'=>'193140714111107',
            'angkatan'=>'2019',
            'sks'=>'120',
        ]);
    }
}
