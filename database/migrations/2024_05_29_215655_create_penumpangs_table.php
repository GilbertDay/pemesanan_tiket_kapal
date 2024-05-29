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
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->string('nama_instansi')->nullable(true);
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('no_telp')->unique();
            $table->string('no_telp_darurat');
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
        Schema::dropIfExists('penumpangs');
    }
};
