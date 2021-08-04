<?php

namespace App\Imports;

use App\Models\guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FirstSheetImportGuru implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection (Collection $rows)
    {
        foreach ($rows as $row ) {
            $guru = guru::create([
                'nama' => $row['nama'],
                'nik'  => $row['nik']
            ]);
            $mapel = explode(" ", $row["mapel"]);
            foreach ($mapel as $id ){
                $guru->mapel()->attach($id);
            }
        }

    }
    public function rules(): array
    {
        return [
            '*.nik' => ['unique:guru,nik']
        ];
    }
}
