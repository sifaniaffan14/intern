<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            // $table->string('jenisBarang');
            // $table->string('merk');
            $table->foreignId('barang_id')->references('id')->on('barangs');
            $table->foreignId('driver_id')->references('id')->on('drivers');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('banyaknya');
            $table->datetime('mulai');
            $table->string('peminjam');
            $table->integer('status_verif');
            $table->string('verifikasi_user');
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
        Schema::dropIfExists('peminjaman');
    }
}
