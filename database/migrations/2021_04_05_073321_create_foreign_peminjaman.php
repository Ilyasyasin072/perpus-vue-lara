<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignPeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->dropForeign('peminjaman_id_buku_foreign');
            $table->dropForeign('peminjaman_id_anggota_foreign');
            $table->dropForeign('peminjaman_id_petugas_foreign');
        });
    }
}
