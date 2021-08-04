<?php

namespace App\Http\Controllers;

use File;
use App\User;
use App\Models\murid;
use League\Csv\Reader;

use App\Jobs\ImportJob;
use App\Models\Pengguna;
use App\Imports\MuridImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siam/murid/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siam/murid/create');
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
            'nis' => 'required|string|unique:murid,nis',
            'nisn' => 'required|string|unique:murid,nisn'
        ]);

        $murid = murid::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp_wali' => $request->no_hp_wali,
        ]);
        $pengguna = Pengguna::create([
            'username' =>$request->nis,
            'password' =>$request->nis,
            'role' =>'murid'
        ]);

        return redirect(route('murid.index'))->with(['success' => 'Murid Baru Ditambahkan']);
    }

    public function import(Request $request){
        $this->validate($request, [
            'file' => 'required'
        ]);

        //JIKA FILE ADA
        if ($request->hasFile('file')) {
            //GET FILE NYA
            $file = $request->file('file');
            //MEMBUAT FILENAME DENGAN MENGAMBIL EKSTENSI DARI FILE YANG DI-UPLOAD
            $filename = time() . '.' . $file->getClientOriginalExtension();

            //FILE TERSEBUT DISIMPAN KEDALAM FOLDER
            // STORAGE > APP > PUBLIC > IMPORT
            //DENGAN MENGGUNAKAN METHOD storeAs()
            $file->storeAs(
                'public/import', $filename
            );

            $csv = Reader::createFromPath(storage_path('app/public/import/' . $filename), 'r');
            //BARIS PERTAMA DI-SET SEBAGAI KEY DARI ARRAY YANG DIHASILKAN
            $csv->setHeaderOffset(0);

            //LOOPING DATA YANG TELAH DI-LOAD
            foreach ($csv as $key =>$row) {
                //SIMPAN KE DALAM TABLE USER
                $baris=$key+1;
                $murid=murid::where('nis',$row['nis'])->get();
                $pengguna=Pengguna::where('username',$row['nis'])->get();
                if ($murid->count()==1) {
                    return redirect()->back()->with(['error' => "Baris ke-$baris nis sudah ada"]);
                }
                if ($pengguna->count()==1) {
                    return redirect()->back()->with(['error' => "Baris ke-$baris username sudah ada"]);
                }
                $murid = murid::create([
                    'nama' => $row['nama'],
                    'nis' => $row['nis'],
                    'nisn' => $row['nisn']
                ]);

                $pengguna = Pengguna::create([
                    'username' =>$row['nis'],
                    'password' =>$row['nis'],
                    'role' =>'murid'
                ]);
            }
            //APABILA PROSES TELAH SELESAI, FILE DIHAPUS.
            File::delete(storage_path('app/public/import/' . $filename));

            //REDIRECT DENGAN FLASH MESSAGE BERHASIL
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        //JIKA TIDAK ADA FILE, REDIRECT ERROR
        return redirect()->back()->with(['error' => 'Failed to upload file']);
    }
    public function import2(Request $request)
    {
        $file = $request->file('file')->store('import');
        $import = new MuridImport;
        $import->import($file);
        // dd($import);
        // dd($import->failures());
        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }
        return back()->withStatus('Import berhasil');
    }

    public function download(){
        $filename='murid.xlsx';
        return response()->download(storage_path('app/public/' . $filename),'template.xlsx');
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
        $murid = murid::find($id);
        return view('siam/murid/edit2',compact('murid'));
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
            'nisn'  => 'required|string|unique:murid,nisn,'.$id,
            'nis'  => 'required|string|unique:murid,nis,'.$id
        ]);
        $murid = murid::find($id);
        $murid->update([
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp_wali' => $request->no_hp_wali,
        ]);
        return redirect()->back()->with(['success' => 'Murid berhasil diperbaharui']);
        // return redirect(route('murid.index'))->with(['success' => 'Murid berhasil diperbaharui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = murid::find($id);
        $murid->delete();
        return redirect(route('murid.index'))->with(['success' => 'Murid berhasil dihapus']);
    }
}
