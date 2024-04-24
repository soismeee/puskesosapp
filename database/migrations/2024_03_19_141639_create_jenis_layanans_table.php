<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_layanans', function (Blueprint $table) {
            $table->uuid('jl_id')->primary();
            $table->string('nama_layanan');
            $table->string('slug');
            $table->text('syarat');
            $table->string('status')->default('show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_layanans');
    }
}
