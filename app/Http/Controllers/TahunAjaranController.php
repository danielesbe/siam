<?php

namespace App\Http\Controllers;

use App\Models\tahun_ajaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siam/tahunAjaran/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siam/tahunAjaran/create');
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
            'nama' => 'required|string|unique:tahun_ajaran,nama'
        ]);
        $tahun = tahun_ajaran::create([
            'nama' => $request->nama
        ]);
        return redirect(route('tahun.index'))->with(['success' => 'Tahun Ajaran Baru Ditambahkan']);
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

    public function active($id){
        $tahun = tahun_ajaran::where('status',1)->exists();
        if ($tahun) {
            tahun_ajaran::where('status',1)->update(['status' => 0]);
        }
        $tahun = tahun_ajaran::find($id);
        $tahun->status = 1;
        $tahun->save();
        return redirect(route('tahun.index'))->with(['success' => 'Tahun Ajaran Actived'] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun = tahun_ajaran::find($id);
        return view('siam/tahunAjaran/edit',compact('tahun'));
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
            'nama' => 'required|string|unique:tahun_ajaran,nama,'.$id
        ]);
        $tahun = tahun_ajaran::find($id);
        $tahun->update([
            'nama' => $request->nama
        ]);
        return redirect(route('tahun.index'))->with(['success' => 'Tahun Ajaran berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun = tahun_ajaran::find($id);
        $tahun->delete();
        return redirect(route('tahun.index'))->with(['success' => 'Tahun Ajaran berhasil dihapus']);
    }
}
