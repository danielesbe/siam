<?php

namespace App\Imports;

use Throwable;
use App\Models\murid;
use App\Models\Pengguna;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class MuridImport implements ToModel,WithHeadingRow,SkipsOnFailure, SkipsOnError,WithValidation
{
    use Importable,SkipsFailures,SkipsErrors;
    public function model(array $row)
    {
        // $pengguna = Pengguna::create([
        //     'username' =>$row['nis'],
        //     'password' =>$row['nis'],
        //     'role' =>'murid'
        // ]);
        return new murid([
            'nama'  => $row['nama'],
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'jenis_kelamin' => $row['jenis_kelamin'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.nis' => ['unique:murid,nis'],
            '*.nisn' => ['unique:murid,nisn']
        ];
    }

    public function onError(Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
