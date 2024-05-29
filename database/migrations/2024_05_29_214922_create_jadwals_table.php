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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('speedboat_id');
            $table->string('pel_asal');
            $table->string('pel_tujuan');
            $table->date('tgl_berangkat');
            $table->time('jam_brgkt');
            $table->time('jam_tiba');
            $table->timestamps();

            $table->foreign('speedboat_id')->references('id')->on('speedboats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
};
