<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenduduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->uuid('nik')->primary();
            $table->uuid('user_id')->index(); // untuk mengelompokan data yang di input oleh user
            $table->uuid('kec_id')->index();
            $table->uuid('dk_id')->index();
            $table->string('no_kk')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nama');
            $table->string('no_telepon');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kec_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('dk_id')->references('id')->on('desa_kelurahans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
}
