<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiBukuKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('buku', function(Blueprint $table){
            $table->unsignedBigInteger('kategori_id')->nullable(); // menambahkan kolom kelas_id
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori');
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
        Schema::table('buku', function(Blueprint $table){
            $table->dropForeign(['kategori_id']);
        });
    }
}
