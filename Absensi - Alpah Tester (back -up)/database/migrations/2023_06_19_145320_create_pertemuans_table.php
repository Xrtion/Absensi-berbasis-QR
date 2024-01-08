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
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id')->nullable()->index();
            $table->date('tanggal');
            $table->integer('guru_id')->nullable()->index();
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('topik');
            $table->integer('ruang_id')->nullable()->index();
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
        Schema::dropIfExists('pertemuans');
    }
};
