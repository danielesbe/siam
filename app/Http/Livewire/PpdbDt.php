<?php

namespace App\Http\Livewire;

use App\Models\ppdb;
use App\Models\wilayah;
use Livewire\Component;
use Livewire\WithPagination;

class PpdbDt extends Component
{
    use WithPagination;
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $status ='';
    public $detailPPDB = false;
    public $ppdb ;
    public $ppdb_id,$nomor_pendaftaran,$nik,$nama,$jenis_kelamin,$nisn,$tempat_lahir,$tanggal_lahir,
    $peringkat,$provinsi,$kabupaten,$kecamatan,$desa,$alamat,$anak_ke,$jumlah_saudara,$no_kk,$nama_ayah,
    $nama_ibu,$nik_ayah,$nik_ibu,$pekerjaan_ayah,$pekerjaan_ibu,$no_hp_wali,$penghasilan,$jenis_prestasi,
    $tingkat,$juara_ke,$nama_prestasi,$npsn_sekolah,$nama_sekolah,$kec_sekolah,$mendaftar_sekolah_lain,
    $mendaftar_sekolah_lain_nama;
    public function render()
    {
        if($this->status==''){$items = ppdb::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
            return view('livewire.ppdb-dt',[
                'items' => $items
            ]);}
        $items = ppdb::query()
        ->Where('status',$this->status)
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDirection)
        ->paginate($this->perPage);
        return view('livewire.ppdb-dt',[
            'items' => $items
        ]);
    }
    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function detailPpdb($id){
        $this->detailPPDB = true;
        $ppdb = ppdb::find($id);

        $this->ppdb_id = $id;
        $this->nomor_pendaftaran= $ppdb->nomor_pendaftaran;
        $this->nik= $ppdb->nik;
        $this->nama= $ppdb->nama;
        $this->jenis_kelamin= $ppdb->jenis_kelamin;
        $this->nisn= $ppdb->nisn;
        $this->tempat_lahir= $ppdb->tempat_lahir;
        $this->tanggal_lahir= $ppdb->tanggal_lahir;
        $this->peringkat= $ppdb->peringkat;
        $this->provinsi= wilayah::where('kode',$ppdb->provinsi)->value('nama');
        $this->kabupaten= wilayah::where('kode',$ppdb->kabupaten)->value('nama');
        $this->kecamatan=wilayah::where('kode',$ppdb->kecamatan)->value('nama'); ;
        $this->desa= wilayah::where('kode',$ppdb->desa)->value('nama') ;
        $this->alamat= $ppdb->alamat_tempat_tinggal;
        $this->anak_ke= $ppdb->anak_ke;
        $this->jumlah_saudara= $ppdb->jumlah_saudara;
        $this->no_kk= $ppdb->no_kk;
        $this->nama_ayah= $ppdb->nama_ayah;
        $this->nama_ibu= $ppdb->nama_ibu;
        $this->nik_ayah= $ppdb->nik_ayah;
        $this->nik_ibu= $ppdb->nik_ibu;
        $this->pekerjaan_ayah= $ppdb->pekerjaan_ayah;
        $this->pekerjaan_ibu= $ppdb->pekerjaan_ibu;
        $this->no_hp_wali= $ppdb->no_hp_wali;
        $this->penghasilan= $ppdb->penghasilan;
        $this->jenis_prestasi= $ppdb->jenis_prestasi;
        $this->tingkat= $ppdb->tingkat;
        $this->juara_ke= $ppdb->juara_ke;
        $this->nama_prestasi= $ppdb->nama_prestasi;
        $this->npsn_sekolah= $ppdb->npsn_sekolah;
        $this->nama_sekolah= $ppdb->nama_sekolah;
        $this->kec_sekolah= $ppdb->kec_sekolah;
        $this->mendaftar_sekolah_lain= $ppdb->mendaftar_sekolah_lain;
        $this->mendaftar_sekolah_lain_nama= $ppdb->mendaftar_sekolah_lain_nama;
    }
    public function verifikasi(){
        $id=$this->ppdb_id;
        $ppdb = ppdb::find($id);
        $cek = ppdb::where('nisn',$ppdb->nisn)->where('status','terverifikasi')->get()->count();
        if($cek>0){
            return redirect()->back()->with(['error'=>'NISN sudah diverifikasi']);
        }
        $ppdb->status = 'terverifikasi';
        $ppdb->save();
        $this->detailPpdb = false;
        // session()->flash('message', 'Pendaftaran berhasil diverifikasi');
        return redirect()->back()->with(['success' =>'Pendaftaran berhasil diverifikasi']);
    }
}
