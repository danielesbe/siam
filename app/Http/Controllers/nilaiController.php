<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\kelas;
use App\Models\murid;
use App\Models\nilai;
use App\Models\tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\komposisi_nilai;
use Illuminate\Support\Facades\DB;
use Spatie\Browsershot\Browsershot;

class nilaiController extends Controller
{
    public function index(){
        $tahun = tahun_ajaran::all();
        $tahun_active = tahun_ajaran::active()->first();
        return view('siam.nilai.nilai',compact('tahun','tahun_active'));
    }
    public function getKelas(Request $request){
        $kelas=kelas::where('id_tahun_ajaran',$request->id_tahun_ajaran)->get();
        $html = '<option value="">Pilih Kelas</option>';
        foreach ($kelas as $row){
            $html = $html."<option value='{$row->id}'>$row->nama</option>";
        }
        return response()->json(array('data'=>$html),200);
    }
    public function getNilaiMurid(Request $request){
        $param['id_tahun_ajaran']=$request->id_tahun;
        $param['id_semester']=$request->id_semester;
        $id_murid=$request->id_murid;
        $murid= murid::find($id_murid);
        $nilai= nilai::where('id_murid',$id_murid)->
                where('id_tahun_ajaran',$request->id_tahun)
                ->where('id_semester',$request->id_semester)->first();
        $nilai->load(['nilai_pengetahuan'=>function($q){$q->orderBy('id_mapel','asc');},
        'nilai_keterampilan'=>function($q){$q->orderBy('id_mapel','asc');},'nilai_sikap']);
        $html="";
        $no=1;
        // foreach($nilai->nilai_pengetahuan as $key){
        //     $html= $html."<td>$no</td>";
        //     $html= $html."<td>$no</td>";
        //     $html= $html."<td>$no</td>";

        // }
        for($a =0; $a < count($nilai->nilai_pengetahuan); $a++){
            $html=$html."<tr>";
            $html= $html."<td>$no</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->mapel->nama."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->uh_1."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->uh_2."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->uh_3."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->uh_4."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->uh_5."</td>";
            $html= $html."<td>".$nilai->nilai_pengetahuan[$a]->nilai_akhir."</td>";
            $html= $html."<td>".$nilai->nilai_keterampilan[$a]->nilai_akhir."</td>";
            $html=$html."</tr>";
            $no++;
        }
        return response()->json(array('nilai'=>$html,'murid'=>$murid),200);

    }
    public function showNilai(Request $request) {
        $kelas=kelas::find($request->kelas);
        $param['id_tahun_ajaran']=$kelas->tahun_ajaran->id;
        $param['tahun_ajaran']=$kelas->tahun_ajaran->nama;
        $param['id_semester']=$request->semester;
        $kelas->load(['murid'=>function($q) use($param){
            $q
            ->with(['nilai'=>function($q)use($param){
                $q->where('id_tahun_ajaran',$param['id_tahun_ajaran'])
                ->where('id_semester',$param['id_semester'])
                ->with(['nilai_pengetahuan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_keterampilan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_sikap']);
            },'catatan'=>function($q)use($param){
                $q->where('id_tahun_ajaran',$param['id_tahun_ajaran'])
                ->where('id_semester',$param['id_semester']);
            },'absensi']);
        }]);
        $tahun = tahun_ajaran::all();
        $tahun_active = tahun_ajaran::active()->first();
        return view('siam.nilai.nilai',compact('kelas','param','tahun','tahun_active'));
    }
    // fungsi menampilkan kelas yang diampu oleh guru
    public function showKelasByGuru(){
        $tahun = tahun_ajaran::active()->first();
        $tahunId = $tahun->id;
        $guru = guru::where('nik',auth()->user()->username)->first();
        $idGuru = $guru->id;
        $kelasByGuru = guru::find($idGuru);
        $kelasByGuru->load(['kelas' => function($q) use($tahunId){
            $q->where('id_tahun_ajaran', $tahunId);
        }]);
        return view('siam/nilai/pengetahuan',compact('kelasByGuru'));
    }
    // menampilkan daftar murid dari kelas yang dipilih guru
    public function showMuridByKelas(Request $request){
        $tahun = tahun_ajaran::active()->first();
        $tahunId = $tahun->id;
        $guru = guru::where('nik',auth()->user()->username)->first();
        $idGuru = $guru->id;
        $filter=[];
        foreach ($guru->mapel as $mapel) {
            $filter['mapel'] = $mapel->id;
        }
        $filter['id_semester'] = $request->id_semester;
        $filter['id_tahun'] = $tahun->id;
        $kelas = kelas::find($request->id_kelas);
        $kelas->load(['murid','murid.nilai'=>
            function($q) use($filter) {
            $q->where('id_tahun_ajaran', $filter['id_tahun'])
            ->where('id_semester', $filter['id_semester']);}
        ,'murid.nilai.nilai_pengetahuan'=>
            function($q) use($filter) {
                $q->where('id_mapel', $filter['mapel']);}
        ,'murid.nilai.nilai_keterampilan'=>
        function($q) use($filter) {
            $q->where('id_mapel', $filter['mapel']);}
        ]);
        $kelasByGuru = guru::find($idGuru);
        $kelasByGuru->load(['kelas' => function($q) use($tahunId){
            $q->where('id_tahun_ajaran', $tahunId);
        }]);
        $cek=komposisi_nilai::where('id_guru',session('id_guru'))->get()->count();
        if($cek>0){
            $filter['uh']=komposisi_nilai::where('id_guru',session('id_guru'))->value('uh');
            $filter['tugas']=komposisi_nilai::where('id_guru',session('id_guru'))->value('tugas');
        }
        else{
            $filter['uh']=3;
            $filter['tugas']=1;
        }
        // return response()->json(['data' =>$kelas]);
        return view('siam/nilai/pengetahuan',compact('kelas','kelasByGuru','filter'));
    }
    //Menyimpan daftar nilai yang diinput oleh guru mata pelajaran
    public function storeNilaiPengetahuan(Request $request){
        $guru = guru::where('nik',auth()->user()->username)->first();
        foreach ($guru->mapel as $mapel) {
            $id_mapel = $mapel->id;
        }
        $tahun                = tahun_ajaran::active()->first();
        $filter['id_tahun']   = $tahun->id;
        $filter['id_semester']= $request->id_semester;

        $id_murid = $request->id_murid;
        $uh1 = $request->uh1;
        $uh2 = $request->uh2;
        $uh3 = $request->uh3;
        $uh4 = $request->uh4;
        $uh5 = $request->uh5;
        $tugas = $request->tugas;
        $uts = $request->uts;
        $uas = $request->uas;
        $praktek = $request->praktek;
        foreach ($id_murid as $key => $value) {
            $divider = 8;
            $uh1[$key]== null ? $divider=$divider - 1: $divider=$divider;
            $uh2[$key]== null ? $divider=$divider - 1: $divider=$divider;
            $uh3[$key]== null ? $divider=$divider - 1: $divider=$divider;
            $uh4[$key]== null ? $divider=$divider - 1: $divider=$divider;
            $uh5[$key]== null ? $divider=$divider - 1: $divider=$divider;
            $na = ($uh1[$key] + $uh2[$key] + $uh3[$key] +$uh4[$key]+$uh5[$key]+ $tugas[$key] + $uts[$key] + $uas[$key] ) / $divider;
            $na = round($na);
            if ($na <=74) {
                $nilaiPredikatPengetahuan='D';
            }
            if ($na >=75 && $na <=83 ) {
                $nilaiPredikatPengetahuan='C';
            }
            if ($na >=84 && $na <=92 ) {
                $nilaiPredikatPengetahuan='B';
            }
            if ($na >=93 && $na <=100 ) {
                $nilaiPredikatPengetahuan='A';
            }
            if ($praktek[$key] <=74) {
                $nilaiPredikatKeterampilan='D';
            }
            if ($praktek[$key] >=75 && $praktek[$key] <=83 ) {
                $nilaiPredikatKeterampilan='C';
            }
            if ($praktek[$key] >=84 && $praktek[$key] <=92 ) {
                $nilaiPredikatKeterampilan='B';
            }
            if ($praktek[$key] >=93 && $praktek[$key] <=100 ) {
                $nilaiPredikatKeterampilan='A';
            }
            $input = array(
                'id_murid' => $value,
                'id_mapel' => $id_mapel,
                'uh1' => $uh1[$key],
                'uh2' => $uh2[$key],
                'uh3' => $uh3[$key],
                'uh4' => $uh4[$key],
                'uh5' => $uh5[$key],
                'tugas' => $tugas[$key],
                'uts' => $uts[$key],
                'uas' => $uas[$key],
                'na' => $na,
                'praktek' => $praktek[$key],
            );
            $murid = murid::find($input['id_murid']);
            $validasi = murid::withCount(['nilai' =>function($q) use($filter) {
                $q->where('id_tahun_ajaran', $filter['id_tahun'])
                ->where('id_semester', $filter['id_semester']);}
            ])->find($input['id_murid']);
            if ($validasi->nilai_count == 0) {
                $nilai = $murid->nilai()->create([
                    'id_tahun_ajaran' => $filter['id_tahun'],
                    'id_semester' => $filter['id_semester'],
                ]);
            }
            $murid->load(['nilai'=>function($q) use($filter) {
                $q->where('id_tahun_ajaran', $filter['id_tahun'])
                ->where('id_semester', $filter['id_semester']);}
            ]);
            // $data[]=$murid;
            foreach ($murid->nilai as $nilai) {
                // DB::table('nilai')->increment('total',$input['nilai_pengetahuan'], ['id' => $nilai->id]);
                DB::table('nilai_pengetahuan')
                ->updateOrInsert(
                ['id_nilai' => $nilai->id, 'id_mapel' => $input['id_mapel']],
                [
                    'uh_1' => $input['uh1'],
                    'uh_2' => $input['uh2'],
                    'uh_3' => $input['uh3'],
                    'uh_4' => $input['uh4'],
                    'uh_5' => $input['uh5'],
                    'tugas' => $input['tugas'],
                    'uts' => $input['uts'],
                    'uas' => $input['uas'],
                    'nilai_akhir' => $input['na'],
                    'predikat' => $nilaiPredikatPengetahuan
                ]
                );
                DB::table('nilai_keterampilan')
                ->updateOrInsert(
                ['id_nilai' => $nilai->id, 'id_mapel' => $input['id_mapel']],
                [
                    'nilai' => $input['praktek'],
                    'predikat' => $nilaiPredikatKeterampilan
                ]
                );
                $idNilai=$nilai->id;
                $murid->load(['nilai.nilai_pengetahuan'=>function($q)use($idNilai){
                    $q->where('id_nilai',$idNilai);
                }]);
                $total=$nilai->nilai_pengetahuan->sum('nilai_akhir');
                $rata2=$nilai->nilai_pengetahuan->avg('nilai_akhir');
                if($rata2==null) $rata2=0;
                $nilai->total=$total;
                $nilai->rata2=$rata2;
                $nilai->save();
            }
        }
        // return redirect(route('nilaiPengetahuan.index'))->with(['success' => 'Nilai telah berhasil dimasukkan']);
        return redirect()->back()->with(['success' => 'Input berhasil']);
        // $json = json_encode($a);
        // return response()->json(['data' => $data]);
    }
    // Menampilkan list kelas wali kelas
    public function showKelasByWakel(){
        $tahun = tahun_ajaran::active()->first();
        $tahunId = $tahun->id;
        $id_wakel=session('id_guru');
        $wakelKelas=kelas::where('id_wali_kelas',$id_wakel)->where('id_tahun_ajaran',$tahunId)->get();
        return view('siam/nilai/sikap',compact('wakelKelas'));
    }
    //menampilkan list murid dari kelas yang dipilih wakel
    public function showMuridByWakel(Request $request){
        $tahun = tahun_ajaran::active()->first();
        $filter['id_tahun']=$tahun->id;
        $filter['id_kelas']=$request->id_kelas;
        $filter['id_wakel']=session('id_guru');
        $filter['id_semester']=$request->id_semester;
        $kelas = kelas::find($filter['id_kelas']);
        $kelas->load(['murid','murid.nilai'=>
            function($q) use($filter) {
            $q->where('id_tahun_ajaran', $filter['id_tahun'])
            ->where('id_semester', $filter['id_semester']);}
            ,'murid.nilai.nilai_sikap'
        ]);
        $wakelKelas=kelas::where('id_wali_kelas',$filter['id_wakel'])->where('id_tahun_ajaran',$filter['id_tahun'])->get();
        return view('siam/nilai/sikap',compact('kelas','wakelKelas','filter'));
    }
    //menyimpan nilai sikap yang dimasukkan oleh wakel
    public function storeNilaiSikap(Request $request){
        $tahun                = tahun_ajaran::active()->first();
        $filter['id_tahun']   =$tahun->id;
        $filter['id_semester']=$request->id_semester;

        $id_murid = $request->id_murid;
        $nilai_spiritual = $request->nilai_spiritual;
        $nilai_spiritual_deskripsi = $request->nilai_spiritual_deskripsi;
        $nilai_sosial = $request->nilai_sosial;
        $nilai_sosial_deskripsi = $request->nilai_sosial_deskripsi;
        foreach ($id_murid as $key => $value) {
            $input = array(
                'id_murid' => $value,
                'nilai_spiritual' => $nilai_spiritual[$key],
                'nilai_spiritual_deskripsi'=>$nilai_spiritual_deskripsi[$key],
                'nilai_sosial' => $nilai_sosial[$key],
                'nilai_sosial_deskripsi' => $nilai_sosial_deskripsi[$key],
            );
            $murid = murid::find($input['id_murid']);
            $validasi = murid::withCount(['nilai' =>function($q) use($filter) {
                $q->where('id_tahun_ajaran', $filter['id_tahun'])
                ->where('id_semester', $filter['id_semester']);}
            ])->find($input['id_murid']);
            if ($validasi->nilai_count == 0) {
                $nilai = $murid->nilai()->create([
                    'id_tahun_ajaran' => $filter['id_tahun'],
                    'id_semester' => $filter['id_semester'],
                ]);
            }
            foreach ($murid->nilai as $nilai) {
                DB::table('nilai_sikap')
                ->updateOrInsert(
                ['id_nilai' => $nilai->id],
                ['nilai_spiritual' => $input['nilai_spiritual']
                ,'nilai_spiritual_deskripsi'=>$input['nilai_spiritual_deskripsi']
                ,'nilai_sosial'=>$input['nilai_sosial']
                ,'nilai_sosial_deskripsi'=> $input['nilai_sosial_deskripsi']
                ]
                );
            }
        }
        return redirect()->back()->with(['success' => 'Input nilai sikap berhasil']);
    }
    // menambah kolom UH
    public function tambahUh(){
        $id = session('id_guru');
        $cek = komposisi_nilai::where('id_guru',$id)->get()->count();
        if($cek>0){
            $temp=komposisi_nilai::where('id_guru',$id)->value('uh');
            if($temp==5){return redirect()->back();}
            komposisi_nilai::where('id_guru', $id)->increment('uh');
            return redirect()->back();
        }
        komposisi_nilai::create([
            'id_guru' => $id
        ]);
        return redirect()->back()->with(['success'=>'kolom UH berhasil ditambahkan']);
    }
    public function kurangUh(){
        $id = session('id_guru');
        $cek = komposisi_nilai::where('id_guru',$id)->get()->count();
        if($cek>0){
            komposisi_nilai::where('id_guru', $id)->decrement('uh');
            return redirect()->back();
        }

        return redirect()->back()->with(['error'=>'kolom UH error']);
    }
    // menampilkan list kelas murid
    public function showKelasByMurid(){
        $listKelas=murid::where('id',session('id_murid'))->first();
        $listKelas->load(['kelas']);
        return view('siam/nilai/rapor',compact('listKelas'));
        // return response()->json(['data'=>$murid]);
    }
    public function showNilaiMurid(Request $request){
        $filter['id_kelas']=$request->id_kelas;
        $filter['id_semester']=$request->id_semester;
        $filter['id_murid']=session('id_murid');
        $listKelas=murid::where('id',session('id_murid'))->first();
        $listKelas->load(['kelas']);
        $kelas=kelas::find($filter['id_kelas']);
        $filter['tahun_ajaran']=$kelas->tahun_ajaran->nama;
        $filter['id_tahun_ajaran']=$kelas->tahun_ajaran->id;
        $kelas->load(['murid'=>function($q) use($filter){
            $q->where('id',$filter['id_murid'])
            ->with(['nilai'=>function($q)use($filter){
                $q->where('id_tahun_ajaran',$filter['id_tahun_ajaran'])
                ->where('id_semester',$filter['id_semester'])
                ->with(['nilai_pengetahuan'=>function($q){$q->orderBy('id_mapel','asc');},
                'nilai_keterampilan'=>function($q){$q->orderBy('id_mapel','asc');},'nilai_sikap']);
            },'absensi','catatan'=>function($q)use($filter){
                $q->where('id_tahun_ajaran',$filter['id_tahun_ajaran'])
                ->where('id_semester',$filter['id_semester']);}]);
        }]);
        return view('siam/nilai/rapor',compact('kelas','listKelas','filter'));
        // return response()->json(['kelas'=>$kelas]);
    }
    public function print($idKelas,$idTahun,$idSemester){
        $kelas=kelas::find($idKelas);
        $param['id_tahun_ajaran']=$idTahun;
        $param['id_semester']=$idSemester;
        $kelas->load(['murid'=>function($q) use($param){
            $q
            ->with(['nilai'=>function($q)use($param){
                $q->where('id_tahun_ajaran',$param['id_tahun_ajaran'])
                ->where('id_semester',$param['id_semester'])
                ->with(['nilai_pengetahuan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_keterampilan'=>function($q){$q->orderBy('id_mapel','asc');}
                ,'nilai_sikap']);
            },'catatan'=>function($q)use($param){
                $q->where('id_tahun_ajaran',$param['id_tahun_ajaran'])
                ->where('id_semester',$param['id_semester']);
            },'absensi']);
        }]);
        return view('rapor',compact('kelas','param'));
    }




}
