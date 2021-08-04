<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NilaiDt extends Component
{
    public $id_tahun_ajaran;
    public $tingkat;
    public $list_kelas=[];
    public $id_kelas;
    public $id_semester;
    public $tahun_list = [];

    public function mount(){
        $this->tahun_list = tahun_ajaran::all();
        $this->id_tahun_ajaran = tahun_ajaran::where('status',1)->first()->value('id');
        $this->id_semester=1;
    }
    public function render()
    {

        return view('livewire.nilai-dt');
    }
    public function updateKelas(){
        $this->list_kelas = kelas::where('nama','like','%'.$this->tingkat.'%')->get();
    }
    public function TampilkanNilaiMurid(){
        $f['id_tahun_ajaran']=$this->id_tahun_ajaran;
        $kelas= kelas::find($this->id_kelas);
        $kelas->load('murid');
        $kelas->load(['murid.nilai'=> function ($q) use($f){
            $q->where('id_tahun_ajaran',$f['id_tahun_ajaran'])
            ->where('id_semester',$f['id_semester'])
            ->with(['nilai_pengetahuan','nilai_keterampilan','nilai_sikap']);
        },'murid.absensi']);

    }
}
