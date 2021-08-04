<?php

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::create([
            'username' => 'admin',
            'password' => ('secret'),
            'role' => 'TU'
        ]);
        Pengguna::create([
            'username' => 'murid',
            'password' => ('secret'),
            'role' => 'murid'
        ]);
        Pengguna::create([
            'username' => 'guru',
            'password' => ('secret'),
            'role' => 'guru'
        ]);
    }
}
