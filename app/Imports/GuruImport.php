<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Imports\FirstSheetImportGuru;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class GuruImport implements WithMultipleSheets,SkipsUnknownSheets
{
    use Importable;
    public function sheets(): array
    {

        return [
            'guru' => new FirstSheetImportGuru()
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
}
