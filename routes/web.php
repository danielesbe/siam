<?php

use App\Models\kelas;
use App\Models\murid;
use App\Models\Pengguna;
use App\Models\tahun_ajaran;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('as', function () {
    for ($i=2; $i <=30 ; $i++) {
        $pengguna = Pengguna::create([
            'username' => 'murid'.$i,
            'password' => 'murid'.$i,
            'role' => 'murid'
        ]);
    }
    // for ($i=2; $i <=30 ; $i++) {
    //     $murid = murid::create([
    //         'nama' => 'Murid '.$i,
    //         'nis' => 'murid'.$i,
    //         'nisn' => 'murid'.$i,
    //         'jenis_kelamin' => 'L',
    //     ]);
    // }

});
Route::get('jk', function () {
        $f['id_tahun_ajaran']='1';
        $f['id_semester']='1';
        // $kelas= kelas::find(1);
        // $kelas->load('murid');
        // $kelas->load(['murid.nilai'=> function ($q) use($f){
        //     $q->where('id_tahun_ajaran',$f['id_tahun_ajaran'])
        //     ->where('id_semester',$f['id_semester'])
        //     ->with(['nilai_pengetahuan','nilai_keterampilan','nilai_sikap']);
        // },'murid.absensi','murid.nilai.nilai_pengetahuan']);
        // dd($kelas);
        $kelas=kelas::find(12);
        $param['id_tahun_ajaran']=$kelas->tahun_ajaran->id;
        $param['id_semester']='1';
        $kelas->load(['murid'=>function($q) use($param){
            $q
            ->with(['nilai'=>function($q)use($param){
                $q->where('id_tahun_ajaran',2)
                ->where('id_semester',$param['id_semester'])
                ->with(['nilai_pengetahuan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_keterampilan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_sikap']);
            },'catatan'=>function($q)use($param){
                $q->where('id_tahun_ajaran',2)
                ->where('id_semester',$param['id_semester']);
            },'absensi']);
        }]);
        $murid = murid::whereHas('kelas', function($q){
            $q->where('id',1);
        })->get();
        $murid->load('nilai');
        return view('rapor',compact('kelas','param'));
})->name('jk');

Route::get('pdf', 'LoginController@pdf');

Route::post('login', 'LoginController@login')->name('siam.post_login');
Route::get('login', 'LoginController@loginForm')->name('siam.login');
Route::get('logout', 'LoginController@logout')->name('siam.logout');
// PPDB guest
Route::get('ppdb', 'ppdbController@getFormPendaftaran')->name('ppdb.pendaftaran');
Route::post('ppdb', 'ppdbController@store')->name('ppdb.store');
Route::get('ppdb/download/{id}', 'ppdbController@download')->name('ppdb.download');
Route::post('/getWil', 'ppdbController@wilayah')->name('wilayah');
Route::get('print', function () {
    return view('ppdb/postPPdb');
});


Route::group(['middleware' => 'siam'], function () {
    Route::get('siam', 'LoginController@dashboard')->name('siam.dashboard');
    Route::get('profile', 'PenggunaController@profileForm')->name('siam.profile');
    Route::post('profile', 'PenggunaController@profileUpdate')->name('siam.profileUpdate');
    // calon murid
    Route::get('ppdb/hasil', 'ppdbController@hasilPPDB')->name('ppdb.hasil');
    Route::get('ppdb/dataPendaftar', 'ppdbController@dataPendaftar')->name('ppdb.dataPendaftar');
    Route::post('ppdb/dataPendaftar', 'ppdbController@update')->name('ppdb.update');
    Route::get('ppdb/cetakPendaftaran', 'ppdbController@print')->name('ppdb.print');
    // kelola Pengguna start
    Route::get('user', 'PenggunaController@index')->name('siam.user');
    Route::get('user/create', 'PenggunaController@create')->name('siam.userCreate');
    Route::post('user', 'PenggunaController@store')->name('siam.userStore');
    Route::get('user/{id}/edit', 'PenggunaController@edit')->name('siam.edit');
    Route::put('user/{id}', 'PenggunaController@update')->name('siam.userUpdate');
    Route::delete('user/{id}', 'PenggunaController@delete')->name('siam.delete');
    Route::post('user/import', 'PenggunaController@import')->name('user.import');
    Route::get('download/user', 'PenggunaController@download')->name('Pengguna.download');
    // kelola Guru
    Route::resource('guru', 'GuruController')->middleware('can:TU');
    Route::post('import/guru', 'GuruController@import')->name('guru.import')->middleware('can:TU');
    Route::get('download-template/guru', 'GuruController@download')->name('guruDownload.template');
    // kelola Mapel
    Route::resource('mapel', 'MapelController');
    Route::get('export/mapel', 'MapelController@export')->name('export.mapel');
    // kelola Tahun ajaran
    Route::resource('tahun', 'TahunAjaranController');
    Route::get('tahun/{id}/active', 'TahunAjaranController@active')->name('tahun.active');
    // kelola murid
    Route::resource('murid', 'MuridController');
    Route::post('murid/import', 'MuridController@import2')->name('murid.import');
    Route::get('download/murid', 'MuridController@download')->name('muridDownload.template');
    // kelola kelas
    Route::resource('kelas', 'kelasController')->except(['create','store']);
    Route::post('kelas/{tahun}/create', 'kelasController@store')->name('kelas.store');
    Route::get('kelas/{idKelas}/anggota', 'kelasController@anggota_kelas')->name('kelas.anggota');
    Route::get('kelas/{idKelas}/guru', 'kelasController@input_guru')->name('kelas.guru');
    Route::get('kelas/{idKelas}/wali', 'kelasController@input_wali')->name('kelas.wali');
    Route::get('kelas/{idKelas}/murid', 'kelasController@input_murid')->name('kelas.murid');
    Route::delete('kelas/{idGuru}/guru/delete', 'kelasController@delete_guru')->name('kelas.dropGuru');
    Route::delete('kelas/{idMurid}/murid/delete', 'kelasController@delete_murid')->name('kelas.dropMurid');
    Route::post('import/kelas/anggota', 'kelasController@import_anggota_kelas')->name('anggotaKelas.import');
    Route::get('download/kelas', 'kelasController@download')->name('anggotaKelas.download');
    // kelola nilai
    Route::get('nilaiPengetahuan/', 'nilaiController@showKelasByGuru')->name('nilaiPengetahuan.index');
    Route::get('nilaiPengetahuan/kelas', 'nilaiController@showMuridByKelas')->name('nilaiPengetahuanKelas.index');
    Route::post('nilaiPengetahuan/kelas', 'nilaiController@storeNilaiPengetahuan')->name('nilaiPengetahuan.store');
    Route::get('nilaiSikap/', 'nilaiController@showKelasByWakel')->name('nilaiSikap.index');
    Route::get('nilaiSikap/kelas', 'nilaiController@showMuridByWakel')->name('nilaiSikap.murid');
    Route::post('nilaiSikap/kelas', 'nilaiController@storeNilaiSikap')->name('nilaiSikap.store');
    Route::get('nilai/', 'nilaiController@showKelasbyMurid')->name('rapor.murid');
    Route::get('nilaiMurid/', 'nilaiController@showNilaiMurid')->name('nilaiByMurid.show');
    Route::get('tambahUh','nilaiController@tambahUh')->name('tambahUh');
    Route::get('kurangUh','nilaiController@kurangUh')->name('kurangUh');
    Route::get('admin/nilai','nilaiController@index')->name('nilai.index');
    Route::post('admin/showNilai','nilaiController@showNilai')->name('nilai.show');
    Route::post('admin/getKelas','nilaiController@getKelas');
    Route::get('print/kelas/{idKelas}/{idTahun}/{idSemester}','nilaicontroller@print')->name('nilai.print');
    Route::get('admin/nilaiMurid/{id}/{tahunAjaran}/{semester}','nilaicontroller@getNilaiMurid');
    Route::post('admin/getNilaiMurid','nilaicontroller@getNilaiMurid');
    // kelola absensi
    Route::get('absensi/kelas', 'absensiController@getKelas')->name('absensi');
    Route::get('absensi/murid', 'absensiController@getMurid')->name('absensi.murid');
    Route::post('absensi/', 'absensiController@absensiStore')->name('absensi.store');
    // kelola catatan
    Route::get('catatan/kelas', 'catatanController@getKelas')->name('catatan');
    Route::get('catatan/murid', 'catatanController@getMurid')->name('catatan.murid');
    Route::post('catatan/', 'catatanController@catatanStore')->name('catatan.store');
    // kelola ppdb
    Route::get('ppdb/index', 'ppdbController@index')->name('ppdb.index')->middleware('can:TU');
    Route::get('ppdb/{id}/verifikasi', 'ppdbController@verifikasi')->name('ppdb.verifikasi')->middleware('can:TU');
    Route::get('ppdb/{id}/terima', 'ppdbController@terima')->name('ppdb.terima')->middleware('can:TU');
    Route::post('ppdb/import', 'ppdbController@import')->name('ppdb.import')->middleware('can:TU');
    Route::get('ppdb/template/download', 'ppdbController@downloadTemplate')->name('ppdb.templateDownload');


    // setting
    Route::get('setting', 'sekolahController@index')->name('setting')->middleware('can:TU');
    Route::post('setting', 'sekolahController@store')->name('setting.store')->middleware('can:TU');
});

Route::get('coba', function () {
    return view('siam/nilai/guru/pengetahuan');
});
Route::get('users/{id}', 'UserController@profile');



