<?php

namespace Tests\Feature;

use App\Models\pengajuan;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class daftarPKLlombaTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_daftar_PKL_lomba_Test()
    {
        $user = User::find(1);
        // $this->withoutExceptionHandling();

        $this->actingAs($user)->post(route('admin.pendaftaranjalurlomba.store'),[
            'nama_lomba'=>'panjat pinang',
            'jenjang_pelaksanaan'=>'kota',
            'rank'=>'3',
            'awal_pelaksanaan'=> '091222',
            'akhir_pelaksanaan'=> '101222',
            'pembimbing'=>'mugiwara',
            'kategori_lomba'=>'For Fun',
            'penyelenggara'=>'dinas pendidikan',
            'URL_lomba'=>'google.com',
            'tempat_lomba'=>'lapangan rampal',
            'produk_lomba'=>'hadiah',
            'sumber_dana'=>'pribadi',
            'data'=>'uwu.pdf',
            'proposal'=>'uwu.pdf'])
            ->assertStatus(302);

        // $this->actingAs($user)->assertDatabaseHas('pengajuans',[
        //     'id'=>32,
        //     'id_user' => 1,
        //     'awal_pelaksanaan'=> 191222,
        //     'akhir_pelaksanaan'=> 101222,
        //     'tahap'=>1,
        //     'status'=> 'proses  ',
        //     'updated_at'=>null,
        //     'created_at'=>null
        // ]);

        // $this->assertDatabaseHas('queues',[
        //     'id_pengajuan' => '32',
        //     'nama_lomba'=>'panjat pinang',
        //     'kategori_lomba'=>'For Fun',
        //     'penyelenggara'=>'dinas pendidikan',
        //     'produk_lomba'=>'hadiah',
        //     'pembimbing'=>'mugiwara',
        //     'URL_lomba'=>'google.com',
        //     'tempat_lomba'=>'lapangan rampal',
        //     'sumber_dana'=>'pribadi',
        //     'jenjang_pelaksanaan'=>'kota',
        //     'rank'=>'3',
        //     'data'=>'uwu.pdf',
        //     'proposal'=>'uwu.pdf'
        // ]);
    }
}
