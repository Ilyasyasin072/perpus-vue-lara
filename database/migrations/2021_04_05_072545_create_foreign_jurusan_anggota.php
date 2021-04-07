<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignJurusanAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->foreign('id_jurusan')->references('id')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign('anggota_id_jurusan_foreign');
        });
    }
}
