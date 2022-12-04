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
            'id_pengajuan'=>'1',
            'nama_lomba'=>'HackerRank',
            'kategori_lomba'=>'AI stars',
            'penyelenggara'=>'google.inc',
            'produk_lomba'=>'Movement Prediction on the Tornado agains preasure effect',
            'pembimbing'=>'Elon Musk',
            'URL_lomba'=>'google.com',
            'tempat_lomba'=>'Online',
            'sumber_dana'=>'Pribadi',
            'jenjang_pelaksanaan'=>'International',
            'rank'=>'1st place',
            'proposal'=>'Susah.pdf',
            'data'=>'Susah.pdf'
        ]);
    }
}
