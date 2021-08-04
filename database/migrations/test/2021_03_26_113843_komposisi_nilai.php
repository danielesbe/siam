<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KomposisiNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komposisi_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_guru');
            $table->integer('uh')->default(1);
            $table->integer('tugas')->default(1);
            $table->integer('uas')->default(1);
            $table->integer('uts')->default(1);
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
        //
    }
}
