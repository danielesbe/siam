<?php

namespace App\Http\Controllers;

use App\rank;
use App\Models\guru;
use App\Models\User;
use App\Models\kelas;
use App\Models\murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

class testing extends Controller
{
    public function kelas(){
        $kelas = kelas::with(['murid','guru'],)->get();
        $murid = murid::with(['kelas'])->get();
        return response()->json(['data' => $murid]);
    }
    public function ppdb(){
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('template.docx'));
        // $template->setValue('tahun_ajaran','2020/2021');
        // $template->setValue('nomor_pendaftaran','ppdb-2020-21');
        $template->setValues(array('firstname' => 'John', 'lastname' => 'Doe'));

        $path = storage_path('ppdb-2020-100.docx');
        $template->saveAs($path);
        // $temp = \PhpOffice\PhpWord\IOFactory::load($path);
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temp, 'PDF');
        // $xmlWriter->save(storage_path('formulir-pendaftaran.pdf'), TRUE);
        return response()->download(storage_path('ppdb-2020-100.docx'));
    }

    public function guruAll(){
        return view('guru');
    }

    public function test(){

        // $val = "IPA";
        // $user = guru::orderBy('id', 'ASC')->get();
        // $rangking=[];
        // $count=1;
        // foreach ($user as $key ) {
        //     rank::create([
        //         'ranking' =>$count
        //     ]);
        //     $rangking[]=$count;
        //     $count++;
        // }
        // $filter='0';
        // $kelas =kelas::withCount(['guru' => function($q) use($filter) {
        //     $q->where('id', $filter);
        // },'murid']) ->find(1);
        // $id_murid = 0;
        // $validasi =kelas::withCount(['murid' => function($q) use($id_murid) {
        //     $q->where('id', $id_murid);
        // },'guru']) ->find(1);
        // // $kelas[0]->guru_count;

        DB::table('nilai_pengetahuan')
        ->updateOrInsert(
        ['id_nilai' => '1', 'id_mapel' => '2'],
        ['nilai' => '2','deskripsi'=>'gila','predikat'=>'e']
    );
    }

    public function testing(){
        $murid=murid::where('id',1)->first();
        // $murid=murid::find(1);

        // $murid->load(['nilai'=>function($q)  {
        //     $q->where('id_tahun_ajaran', 1)
        //     ->where('id_semester', 1)
        //     ->with(['nilai_pengetahuan'=>function($q){
        //         $q->where('id',1);
        //     }]);}
        // ]);
        $murid->load([
            'nilai'=>function($q) {
                $q->where('id_tahun_ajaran',1)->where('id_semester',1)->
                with(['nilai_pengetahuan'=>function($q){
                    $q->where('id_nilai',1);
                }]);
            },
            'kelas'=>function($q){
                $q->where('id_tahun_ajaran',1);
            }
            ]);
        $total;
        foreach ($murid->nilai as $nilai) {
            $total=$nilai->nilai_pengetahuan->sum('nilai');
            $rata=$nilai->nilai_pengetahuan->avg('nilai');
        }
        return response()->json(['data'=>$murid,'total'=>$total,'rata'=>$rata]);
    }
    public function tes(){
            $nik='guru100';
            $guru=guru::where('nik',$nik)->first();
            $validasi1=kelas::with(['guru' => function($q) use($nik) {
                $q->where('nik', $nik);
            }]) ->find(2);

            if ($validasi1->guru->count() == 0) {
                $kelas = kelas::find(2);
                    $kelas->guru()->attach($guru->id);

            }
            $nis='190056';
            $murid=murid::where('nis', $nis)->first();
            $validasi=kelas::with(['murid' => function($q) use($nis)  {
                $q->where('nis', $nis);
            }]) ->find(2);
            if ($validasi->murid->count() == 0) {
                $kelas = kelas::find(2);

                    $kelas->murid()->attach($murid->id);

            }
        return response()->json(['data'=>$validasi,'data2'=>$validasi1]);
    }
}
