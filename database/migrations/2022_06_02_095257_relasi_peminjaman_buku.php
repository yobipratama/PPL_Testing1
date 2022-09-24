<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPeminjamanBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('peminjaman', function(Blueprint $table){
            $table->unsignedBigInteger('buku_id')->nullable(); // menambahkan kolom kelas_id
            $table->foreign('buku_id')->references('id_buku')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('peminjaman', function(Blueprint $table){
            $table->dropForeign(['buku_id']);
        });
    }
}
