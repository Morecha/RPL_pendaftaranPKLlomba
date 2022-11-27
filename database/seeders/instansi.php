<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class instansi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instansis')->insert([
            'id_user'=>'1',
            'nama_perusahaan'=>'PT. Pilar Cipta Solusi Integratika',
            'tanggal_masuk'=>'251021',
            'tanggal_selesai'=>'250222',
            'nama_direktur'=>'pak rizal',
            'alamat_kantor'=>'Kepuh GK. III No. 1092C/GK III, RT 44 RW 12, Klitren, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia 55222',
            'status'=>'selesai'
        ]);
    }
}
