<?php

namespace App\Imports;

use App\Models\ppdb;
use App\Models\murid;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class HasilPPDBImport implements ToCollection , WithHeadingRow
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $ppdb = ppdb::where('nisn',$row['nisn'])->first();
            $input['nisn']=$ppdb->nisn;
            $input['nis']=$ppdb->nisn;
            $input['nama']=$ppdb->nama;
            $input['jenis_kelamin']=$ppdb->jenis_kelamin;
            $input['tempat_lahir']=$ppdb->tempat_lahir;
            $input['tanggal_lahir']=$ppdb->tanggal_lahir;
            $input['alamat']=$ppdb->alamat;
            $input['no_hp_wali']=$ppdb->no_hp_wali;
            murid::create($input);
            $ppdb->status = 'diterima';
            $ppdb->save();
        }
    }
}
