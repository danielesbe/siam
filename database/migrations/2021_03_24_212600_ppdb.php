<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ppdb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pendaftaran')->unique();
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('nisn');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('peringkat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('alamat');
            $table->string('anak_ke');
            $table->string('jumlah_saudara');
            $table->string('no_kk');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('no_hp_wali');
            $table->string('penghasilan');
            $table->string('jenis_prestasi');
            $table->string('tingkat');
            $table->string('juara_ke');
            $table->string('nama_prestasi');
            $table->string('npsn_sekolah');
            $table->string('nama_sekolah');
            $table->string('kec_sekolah');
            $table->string('mendaftar_sekolah_lain');
            $table->string('mendaftar_sekolah_lain_nama');
            $table->string('status');
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
