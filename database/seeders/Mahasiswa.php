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
            'HP'=>'082220508262',
            'angkatan'=>'2022',
            'sks'=>'160',
        ]);

        DB::table('mahasiswas')->insert([
            'nama'=>'Madda',
            'nim'=>'193140714111107',
            'HP'=>'082220508262',
            'angkatan'=>'2019',
            'sks'=>'120',
        ]);

        DB::table('mahasiswas')->insert([
            'nama'=>'Iknajah',
            'nim'=>'150535607292',
            'HP'=>'082220508262',
            'angkatan'=>'2016',
            'sks'=>'80',
        ]);

        DB::table('mahasiswas')->insert([
            'nama'=>'Budi',
            'nim'=>'21093012042',
            'HP'=>'08123814012',
            'angkatan'=>'2011',
            'sks'=>'80',
        ]);
    }
}
