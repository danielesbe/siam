<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use App\Imports\AnggotaKelasImport;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('siam/kelas/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tahun_ajaran_id)
    {
        $tahun = $tahun_ajaran_id;
        return view('siam/kelas/create',compact('tahun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id_tahun_ajaran
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id_tahun_ajaran)
    {
        // $user = pengguna::where('username',$request->username)->exists();
        $cekKelas = kelas::where('id_tahun_ajaran', $id_tahun_ajaran)
                 ->where('nama',$request->nama)->exists();
         if($cekKelas){
            return redirect()->back()->with(['error' => 'Kelas sudah ada']);
        }
        $kelas =kelas::create([
            'nama' =>$request->nama,
            'id_tahun_ajaran' =>$id_tahun_ajaran
        ]);
        return redirect()->back()->with(['success' => 'Kelas Berhasil ditambahkan']);

    }

    public function anggota_kelas($id){
        $kelas = kelas::find($id);
        return view('siam/kelas/anggota',compact('kelas'));
    }
    public function download(){
        return response()->download(storage_path('app/public/anggotakelas.xlsx'), 'template-kelas-anggota.xlsx');
    }
    public function import_anggota_kelas(Request $request){
        $file = $request->file('file')->store('import');
        // dd($request->id_kelas);
        $import = new AnggotaKelasImport($request->id_kelas);
        $import->import($file);
        // dd($import);
        return redirect()->back()->with(['success' => 'Import berhasil']);
        // return back()->withStatus('Import berhasil');
    }

    public function input_guru(Request $request, $id_kelas){
        $id_guru = $request->id_guru;
        $validasi =kelas::withCount(['guru' => function($q) use($id_guru) {
            $q->where('id', $id_guru);
        }]) ->find($id_kelas);
        if ($validasi->guru_count == 0) {
            $kelas = kelas::find($id_kelas);
            $kelas->guru()->attach($request->id_guru);
            return redirect()->back()->with(['success' => 'Input guru berhasil']);
        }
        return redirect()->back()->with(['error' => 'Guru sudah ada']);
    }
    public function delete_guru(Request $request, $id_guru){
        $id_kelas = $request->id_kelas;
        $kelas = kelas::find($id_kelas);
        $kelas->guru()->detach($id_guru);
        return redirect()->back()->with(['success' => 'Guru dikeluarkan dari kelas']);
    }

    public function delete_murid(Request $request, $id_murid){
        $id_kelas = $request->id_kelas;
        $kelas = kelas::find($id_kelas);
        $kelas->murid()->detach($id_murid);
        return redirect()->back()->with(['success' => 'Murid dikeluarkan dari kelas']);
    }

    public function input_murid(Request $request, $id_kelas){
        $id_murid = $request->id_murid;
        $validasi =kelas::withCount(['murid' => function($q) use($id_murid) {
            $q->where('id', $id_murid);
        }]) ->find($id_kelas);
        if ($validasi->murid_count == 0) {
            $kelas = kelas::find($id_kelas);
            $kelas->murid()->attach($request->id_murid);
            return redirect()->back()->with(['success' => 'Input murid berhasil']);
        }
        return redirect()->back()->with(['error' => 'Murid Sudah ada']);
    }
    public function input_wali(Request $request, $id_kelas){
        $id_wali_kelas=$request->id_wali_kelas;
        $id_kelas = $id_kelas;
        $kelas =kelas::find($id_kelas);
        $kelas->update([
            'id_wali_kelas' => $id_wali_kelas
        ]);
        return redirect()->back()->with(['success' => 'Wali kelas diperbaharui']);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas=kelas::find($id);
        $kelas->guru()->detach();
        $kelas->murid()->detach();
        $kelas->delete();
        return redirect()->back()->with(['success' => 'Kelas telah dihapus']);
    }
}
