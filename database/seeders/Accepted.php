<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Accepted extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Accepteds')->insert([
            'id_user'=>'1',
            'nilai_pengganti'=>'80',
            'file'=>'Susah.pdf'
        ]);
    }
}
