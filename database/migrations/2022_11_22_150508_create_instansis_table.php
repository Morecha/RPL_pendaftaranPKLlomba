<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instansis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengajuan')->unsigned()->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('URL_medsos')->nullable();   #new
            $table->string('penerima_surat')->nullable();   #new
            $table->string('jabatan')->nullable();  #new
            $table->string('objek')->nullable();    #new
            $table->string('URL_pkl')->nullable();  #new
            $table->string('alamat_kantor')->nullable();
            $table->timestamps();

            $table->foreign('id_pengajuan')->references('id')->on('pengajuans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instansis');
    }
}
