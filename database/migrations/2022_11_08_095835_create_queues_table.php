<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pengajuan')->unsigned()->nullable();
            $table->string('nama_lomba')->nullable();
            $table->string('kategori_lomba')->nullable(); #new
            $table->string('penyelenggara')->nullable(); #new
            $table->string('produk_lomba')->nullable(); #new
            $table->string('pembimbing')->nullable(); #new
            $table->string('URL_lomba')->nullable(); #new
            $table->string('tempat_lomba')->nullable(); #new
            $table->string('sumber_dana')->nullable(); #new
            $table->string('jenjang_pelaksanaan')->nullable();
            $table->string('rank')->nullable(); # sama kaya hasil lomba dr tanzil
            $table->string('proposal')->nullable();
            $table->string('data')->nullable();
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
        Schema::dropIfExists('queues');
    }
}
