<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\kelas;
use App\Models\murid;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class absensiController extends Controller
{
    public function getKelas(){
        $tahun = tahun_ajaran::active()->first();
        $tahunId = $tahun->id;
        $id_wakel=session('id_guru');
        $wakelKelas=kelas::where('id_wali_kelas',$id_wakel)->where('id_tahun_ajaran',$tahunId)->get();
        return view('siam/absensi/index',compact('wakelKelas'));
    }
    public function getMurid(Request $request){
        $tahun = tahun_ajaran::active()->first();
        $filter['id_tahun']=$tahun->id;
        $filter['id_kelas']=$request->id_kelas;
        $filter['id_wakel']=session('id_guru');
        $filter['id_semester']=$request->id_semester;
        $kelas = kelas::find($filter['id_kelas']);
        $kelas->load(['murid','murid.absensi'=>
            function($q) use($filter) {
            $q->where('id_tahun_ajaran', $filter['id_tahun'])
            ->where('id_semester', $filter['id_semester']);}
        ]);
        $wakelKelas=kelas::where('id_wali_kelas',$filter['id_wakel'])->where('id_tahun_ajaran',$filter['id_tahun'])->get();
        return view('siam/absensi/index',compact('kelas','wakelKelas','filter'));
    }
    public function absensiStore(Request $request){
        $tahun                = tahun_ajaran::active()->first();
        $filter['id_tahun']   =$tahun->id;
        $filter['id_semester']=$request->id_semester;

        $id_murid = $request->id_murid;
        $sakit = $request->sakit;
        $ijin = $request->ijin;
        $alpa = $request->alpa;

        foreach ($id_murid as $key => $value) {
            $input = array(
                'id_murid' => $value,
                'sakit' => $sakit[$key],
                'ijin' => $ijin[$key],
                'alpa' => $alpa[$key],
            );
            $murid = murid::find($input['id_murid']);
                DB::table('absensi')
                ->updateOrInsert(
                ['id_murid' => $input['id_murid'],
                'id_tahun_ajaran' => $filter['id_tahun'],
                'id_semester' => $filter['id_semester']
                ],
                ['sakit' => $input['sakit']
                ,'ijin'=>$input['ijin']
                ,'alpa'=>$input['alpa']
                ]
                );
        }
        return redirect()->back()->with(['success' => 'Input absensi berhasil']);
    }

    public function catatanKelas(){

    }
}
