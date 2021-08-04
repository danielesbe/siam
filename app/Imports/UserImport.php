<?php

namespace App\Imports;

use Throwable;
use App\Models\Pengguna;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel,WithHeadingRow,SkipsOnFailure, SkipsOnError,WithValidation
{
    use Importable,SkipsFailures,SkipsErrors;
    public function model(array $row)
    {
        return new Pengguna([
            'username'  => $row['username'],
            'password' => $row['password'],
            'role' => $row['role'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.username' => ['unique:pengguna,username']
        ];
    }
    public function onError(Throwable $e)
    {
        // Handle the exception how you'd like.
    }
}
