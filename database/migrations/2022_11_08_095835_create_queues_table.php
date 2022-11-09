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
            $table->string('nama_lomba')->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->string('jenjang_pelaksanaan')->nullable();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->string('status')->nullable();
            $table->string('rank')->nullable();
            $table->string('data')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
