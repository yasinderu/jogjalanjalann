<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('keterangan_objek');
            $table->binary('gambar')->nullable();
            $table->string('nama_admin')->nullable();
            $table->float('map')->nullable();
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
        Schema::dropIfExists('Isi');
    }
}
