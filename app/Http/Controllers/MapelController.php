<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use App\Exports\MapelExport;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siam/mapel/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siam/mapel/create');
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
            'nama' => 'required|string|unique:mapel,nama'
        ]);
        $mapel = mapel::create([
            'nama' => $request->nama
        ]);
        return redirect(route('mapel.index'))->with(['success' => 'Mapel Baru Ditambahkan']);
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
    public function export(){
        return (new MapelExport)->download('mapel.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = mapel::find($id);
        return view('siam/mapel/edit',compact('mapel'));
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
            'nama' => 'required|string|unique:mapel,nama,'.$id
        ]);
        $mapel = mapel::find($id);
        $mapel->update([
            'nama' => $request->nama
        ]);
        return redirect(route('mapel.index'))->with(['success' => 'Mapel berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = mapel::find($id);
        $mapel->delete();
        return redirect(route('mapel.index'))->with(['success' => 'Mapel berhasil dihapus']);
    }
}
