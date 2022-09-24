<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiPengembalianMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pengembalian', function(Blueprint $table){
            $table->unsignedBigInteger('member_id')->nullable(); // menambahkan kolom kelas_id
            $table->foreign('member_id')->references('id_member')->on('member');
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
        Schema::table('pengembalian', function(Blueprint $table){
            $table->dropForeign(['member_id']);
        });
    }
}
