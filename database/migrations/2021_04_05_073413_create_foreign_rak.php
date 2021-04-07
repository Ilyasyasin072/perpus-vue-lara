<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignRak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rak', function (Blueprint $table) {
            $table->foreign('id_buku')->references('id')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rak', function (Blueprint $table) {
            $table->dropForeign('rak_id_buku_foreign');
        });
    }
}
