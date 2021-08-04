<?php

namespace App\Exports;

use App\Models\mapel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MapelExport implements FromCollection,ShouldAutoSize,WithHeadings,WithMapping
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mapel::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'nama',
        ];
    }
    public function map($mapel): array
    {
        return [
            $mapel->id,
            $mapel->nama
        ];
    }
}
