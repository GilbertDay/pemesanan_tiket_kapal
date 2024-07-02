<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id');
            $table->string('penumpang_id');
            $table->string('jadwal_id');
            $table->string('metode_pembayaran_id');
            $table->string('biaya_penanganan');
            $table->string('status');
            $table->string('jenis_layanan');
            $table->integer('jumlah_kursi');
            $table->integer('harga');
            $table->integer('diskon');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jadwal_id')->references('id')->on('jadwals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayarans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
