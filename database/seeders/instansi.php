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
            'id_pengajuan'=>'2',
            'nama_perusahaan'=>'PT. Pilar Cipta Solusi Integratika',
            'URL_medsos'=>'www.pilarsolusi.com',
            'penerima_surat'=>'Pak Rizal',
            'jabatan'=>'direktur',
            'objek'=>'Konsultan Teknologi Informasi',
            'URL_pkl'=>'https://id.linkedin.com/company/pt-pilar-cipta-solusi-integratika',
            'alamat_kantor'=>'Kepuh GK. III No. 1092C/GK III, RT 44 RW 12, Klitren, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia 55222',
        ]);
    }
}
