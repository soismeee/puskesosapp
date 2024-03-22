<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasPengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pengajuan_id')->index();
            $table->string('berkas');
            $table->string('syarat_pengajuan');
            $table->timestamps();

            $table->foreign('pengajuan_id')->references('id')->on('pengajuans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas_pengajuans');
    }
}
