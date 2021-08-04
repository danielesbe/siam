<?php

namespace App\Http\Controllers;

use App\Models\sekolah;
use Illuminate\Http\Request;

class sekolahController extends Controller
{
    public function index(){
        $setting = sekolah::first();
        return view('siam.setting.index',compact('setting'));
    }
    public function store(Request $request){
        if($request->tanggal_pengumuman_tutup <= $request->tanggal_pengumuman_buka)
        {return redirect()->back()->with(['error'=> 'tanggal pengumuman tutup harus lebih dari tanggal pengumuman buka'] );}
        if($request->tanggal_nilai_tutup <= $request->tanggal_nilai_buka)
        {return redirect()->back()->with(['error'=> 'tanggal nilai tutup harus lebih dari tanggal nilai buka'] );}
        $input= $request->except('_token');
        $setting = sekolah::first()->update($input);
        return redirect()->back()->with(['success'=>'Setting diupdate']);
    }
}
