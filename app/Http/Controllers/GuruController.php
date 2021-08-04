<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\Pengguna;
use App\Imports\GuruImport;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siam/guru/guru');
    }
    public function download(){
        $filename='guru.xlsx';
        return response()->download(storage_path('app/public/' . $filename),'template.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = mapel::all();
        return view('siam/guru/create',compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'nik'  => 'required|string|unique:guru,nik'
        ]);
        $guru = guru::create([
            'nama' => $request->nama,
            'nik'  => $request->nik
        ]);
        $mapel = $request->mapel;
        foreach ($mapel as $item) {
            $guru->mapel()->attach($item);
        }
        $pengguna = Pengguna::create([
            'username' =>$request->nik,
            'password' =>$request->nik,
            'role' =>'guru'
        ]);

        return redirect(route('guru.index'))->with(['success' => 'Guru Baru Ditambahkan']);
    }
    public function import(Request $request){
        $file = $request->file('file')->store('import');
        $import = new GuruImport;
        $import->import($file);
        // dd($import->failures());
        // if ($import->failures()->isNotEmpty()) {
        //     return back()->withFailures($import->failures());
        // }
        return back()->withStatus('Import berhasil');
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
        $mapel = mapel::all();
        $guru = guru::find($id);
        return view('siam/guru/edit',compact('guru','mapel'));
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
        $this->validate($request, [
            'nama' => 'required|string',
            'nik'  => 'required|string|unique:guru,nik,'.$id
        ]);

        $guru = guru::find($id);
        $guru->update([
            'nama' => $request->nama,
            'nik'  => $request->nik
        ]);
        $guru->mapel()->detach();
        $mapel = $request->mapel;
        foreach ($mapel as $item) {
            $guru->mapel()->attach($item);
        }
        return redirect(route('guru.index'))->with(['success' => 'Guru berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = guru::find($id);
        $guru->mapel()->detach();
        $guru->delete();
        return redirect(route('guru.index'))->with(['success' => 'Guru berhasil dihapus']);
    }
}
