<?php

namespace App\Imports;

use App\Models\guru;
use App\Models\kelas;
use App\Models\murid;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AnggotaKelasImport implements ToCollection , WithHeadingRow
{
    use Importable;
    private $id_kelas;
    public function __construct($id)
    {
        $this->id_kelas = $id;
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row )
        {
            if($row['nik'] !== null){
                $nik=$row['nik'];
                $guru=guru::where('nik',$nik)->first();
                $validasi1=kelas::with(['guru' => function($q) use($nik) {
                $q->where('nik', $nik);
                }]) ->find($this->id_kelas);

                if ($validasi1->guru->count() == 0) {
                $kelas = kelas::find($this->id_kelas);
                    $kelas->guru()->attach($guru->id);
                }
            }
            if($row['nis'] !== null){
                $nis=$row['nis'];
                $murid=murid::where('nis', $nis)->first();
                $validasi=kelas::with(['murid' => function($q) use($nis)  {
                    $q->where('nis', $nis);
                }]) ->find($this->id_kelas);
                if ($validasi->murid->count() == 0) {
                    $kelas = kelas::find($this->id_kelas);
                        $kelas->murid()->attach($murid->id);
                }
                }


        }
    }
}

