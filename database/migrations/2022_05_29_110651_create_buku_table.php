<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('judul_buku', 255);
            $table->string('nama_pengarang', 255);
            $table->string('nama_penerbit', 255);
            $table->integer('ketebalan')->unsigned();
            $table->integer('tahun_terbit')->unsigned();
            $table->integer('jumlah_buku')->unsigned();
            $table->string('upload_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
