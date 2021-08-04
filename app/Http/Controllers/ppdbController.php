<?php

namespace App\Http\Controllers;
use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\ppdb;
use App\Models\murid;
use App\Models\sekolah;
use App\Models\wilayah;
use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\HasilPPDBImport;

class ppdbController extends Controller
{
    public function getFormPendaftaran(){
        $provinsi = wilayah::whereRaw('LENGTH(kode) =2')->orderBy('nama','asc')->get();
        return view('ppdb/ppdb', compact('provinsi'));
    }
    public function import(Request $request){
        $file = $request->file('file')->store('import');
        $import = new HasilPPDBImport();
        $import->import($file);
        return redirect()->back()->with(['success' => 'Import berhasil']);
    }
    public function hasilPPDB(){
        $setting = sekolah::first();
        $tgl_buka = $setting->tanggal_pengumuman_buka;
        $tgl_tutup = $setting->tanggal_pengumuman_tutup;
        if(Carbon::today()->toDateString() >= $tgl_buka & Carbon::today()->toDateString() <=$tgl_tutup){
            $ppdb=ppdb::where('nisn',session('nisn'))->first();
            return view('ppdb/hasil',compact('ppdb'));
        }
        else{
            // $tgl = Carbon::today()->toDateString();
            return view('ppdb.pengumuman',compact('tgl_buka','tgl_tutup'));
        }

    }

    public function index(){
        $ppdb = ppdb::all();
        $filter=[];
        $filter['terdaftar']= ppdb::where('status','terdaftar')->get()->count();
        $filter['terverifikasi']= ppdb::where('status','terverifikasi')->get()->count();
        $filter['diterima']= ppdb::where('status','diterima')->get()->count();
        return view('siam/ppdb/index',compact('ppdb','filter'));
        // return response()->json(['terdaftar'=>$filter['terdaftar'],'terverifikasi'=>$filter['terverifikasi']]);
    }
    public function store(Request $request){
        $this->validate($request, [
            'akta' => 'required|image|mimes:png,jpeg,jpg',
            'kk' => 'required|image|mimes:png,jpeg,jpg',
            'rapor' => 'required|image|mimes:png,jpeg,jpg'
        ]);
        $tahun= date("Y");
        $bulan= date("m");
        $hari= date("d");
        $ppdb = ppdb::all();
        if($ppdb->count()==0) {$nomor_pendaftaran = "$hari"."$bulan"."$tahun"."1";}
        else {$last = $ppdb->last();$numb= $last->id +1;$nomor_pendaftaran = "$hari"."$bulan"."$tahun"."$numb";}
        $alamat['provinsi']= wilayah::where('kode', $request->provinsi)->value('nama');
        $alamat['kabupaten']= wilayah::where('kode', $request->kabupaten)->value('nama');
        $alamat['kecamatan']= wilayah::where('kode', $request->kecamatan)->value('nama');
        $alamat['desa']= wilayah::where('kode', $request->desa)->value('nama');

        $file = $request->file('akta');
        $filename = time() . '-akta' . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/berkas', $filename);
        $input = $request->all();
        $input['akta'] = $filename;

        $file = $request->file('kk');
        $filename = time() . '-kk' . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/berkas', $filename);
        $input = $request->all();
        $input['kk'] = $filename;

        $file = $request->file('rapor');
        $filename = time() . '-rapor' . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/berkas', $filename);
        $input = $request->all();
        $input['rapor'] = $filename;

        $input['nomor_pendaftaran']=$nomor_pendaftaran;
        $input['alamat']="Ds. ".$alamat['desa']." Kec. ".$alamat['kecamatan']." ".$alamat['kabupaten']." ".$alamat['provinsi'] ;
        $ppdb = ppdb::create($input);
        $input['provinsi'] =wilayah::where('kode',$request->provinsi)->first();
        $input['kecamatan'] =wilayah::where('kode',$request->kecamatan)->first();
        $input['kabupaten'] = wilayah::where('kode',$request->kabupaten)->first();
        $input['desa'] = wilayah::where('kode',$request->desa)->first();
        $input['username']=$request->nisn;
        $pengguna['username']=$request->nisn;
        $pengguna['password']=$request->nisn;
        $pengguna['role']='calon';
        pengguna::create($pengguna);
        $id=$ppdb->id;
        return view('ppdb/postPPdb',['input'=>$input]);
    }
    public function print(){
        $ppdb = ppdb::where('nisn',session('nisn'))->first();
        return view('ppdb.printPpdb',compact('ppdb'));
    }
    public function dataPendaftar(){
        $nisn=session('nisn');
        $dataPendaftar=ppdb::where('nisn',$nisn)->first();
        $kecamatan = wilayah::whereRaw('LENGTH(kode) =2')->orderBy('nama','asc')->get();
        return view('ppdb.dataPendaftar',compact('dataPendaftar','kecamatan'));
    }
    public function update(Request $request){
        $input=$request->except('provinsi','kabupaten','kecamatan','desa','_token');
        ppdb::where('nisn',session('nisn'))->update($input);
        pengguna::where('username',session('nisn'))->update(['username'=>$request->nisn]);
        session(['nisn'=>$request->nisn]);
        return redirect()->action('ppdbController@dataPendaftar')->with(['success' => 'data berhasil diupdate']);
    }
    public function download($no_pendaftaran){
        \PhpOffice\PhpWord\Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        $temp = \PhpOffice\PhpWord\IOFactory::load(storage_path("$no_pendaftaran".".docx"));
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temp, 'PDF');
        $xmlWriter->save(storage_path("$no_pendaftaran".".pdf"), TRUE);
        return response()->download(storage_path("$no_pendaftaran".".pdf"));
    }
    public function downloadTemplate(){
        return response()->download(storage_path('app/public/ppdb.xlsx'), 'template-terima-murid.xlsx');
    }

    public function wilayah(Request $request){
        $data = $request->data;
        $id = $request->id;
        $n=strlen($id);
        $m=($n==2?5:($n==5?8:13));
        if ($data=="kabupaten") {
            $daerah= wilayah::whereRaw("LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m")->orderBy('nama','asc')->get();
            $html = '
            <option value="">Pilih Kabupaten/Kota</option>';
            foreach ($daerah as $row ) {
                $html=$html."<option value='{$row->kode}'>$row->nama</option>";
            }
            $html=$html.'</select>';
        // return $html;
        return response()->json(array('data'=> $html), 200);
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
        }
        if($data=="kecamatan") {
            $daerah= wilayah::whereRaw("LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m")->orderBy('nama','asc')->get();
            $html = '
            <option value="">Pilih Kecamatan</option>';
            foreach ($daerah as $row ) {
                $html=$html."<option value='{$row->kode}'>$row->nama</option>";
            }
            $html=$html.'</select>';
            return response()->json(array('data'=> $html), 200);
        }
        if($data=="desa") {
            $daerah= wilayah::whereRaw("LEFT(kode,'$n')='$id' AND CHAR_LENGTH(kode)=$m")->orderBy('nama','asc')->get();
            $html = '
            <option value="">Pilih Desa</option>';
            foreach ($daerah as $row ) {
                $html=$html."<option value='{$row->kode}'>$row->nama</option>";
            }
            $html=$html.'</select>';
            return response()->json(array('data'=> $html), 200);
        }
    }

    public function verifikasi($id){
        $ppdb = ppdb::find($id);
        $ppdb->status = 'terverifikasi';
        $ppdb->save();
        return redirect()->back()->with(['success' =>'Pendaftaran berhasil diverifikasi']);
    }

    public function verifikasi2($id){
        $ppdb = ppdb::find($id);
        $cek = ppdb::where('nisn',$ppdb->nisn)->where('status','terverifikasi')->get()->count();
        if($cek>0){
            return redirect()->back()->with(['error'=>'NISN sudah diverifikasi']);
        }
        $ppdb->status = 'terverifikasi';
        $ppdb->save();
        return redirect()->back()->with(['success' =>'Pendaftaran berhasil diverifikasi']);
    }

    public function terima($id){
        $ppdb =ppdb::find($id);
        $ppdb->status = 'diterima';
        $ppdb->save();
        $murid = murid::create([
            'nama' => $ppdb->nama,
            'jenis_kelamin' => $ppdb->jenis_kelamin,
            'nis' => $ppdb->nisn,
            'nisn' => $ppdb->nisn,
            'tempat_lahir' => $ppdb_tempat_lahir,
            'tanggal_lahir' => $ppdb_tanggal_lahir,
        ]);
        $pengguna = Pengguna::create([
            'username' =>$ppdb->nisn,
            'password' =>$ppdb->nisn,
            'role' =>'murid'
        ]);
        return redirect()->back()->with(['success' => 'Murid Diterima']);
    }

}
