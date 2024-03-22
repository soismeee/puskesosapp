<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->uuid('penduduk_nik')->index();
            $table->uuid('jl_id')->index();
            $table->string('nama_pelapor');
            $table->string('hubungan_pelapor');
            $table->string('status')->default('Pengajuan');
            $table->string('keperluan');
            $table->text('keterangan')->nullable();
            $table->date('tanggal');
            $table->string('berkas_dinas')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jl_id')->references('id')->on('jenis_layanans')->onDelete('cascade');
            $table->foreign('penduduk_nik')->references('nik')->on('penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuans');
    }
}
