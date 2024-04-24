<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desa_kelurahans', function (Blueprint $table) {
            $table->uuid('dk_id')->primary();
            $table->uuid('kec_id')->index();
            $table->string('nama_dk');
            $table->timestamps();

            $table->foreign('kec_id')->references('kec_id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desa_kelurahans');
    }
}
