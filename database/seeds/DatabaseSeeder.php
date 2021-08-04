<?php



use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     $this->call(UserSeeder::class);

    //     DB::table('semester')->insert([
    //         ['nama' => '1',],
    //         ['nama' => '2']
    //     ]);
    //     DB::table('tahun_ajaran')->insert([
    //         ['nama' => '2020/2021',],
    //         ['nama' => '2021/2022'],
    //         ['nama' => '2022/2023'],
    //         ['nama' => '2023/2024'],
    //     ]);
    //     DB::table('mapel')->insert([
    //         ['nama' => 'Al-Qur’an Hadits',],
    //         ['nama' => 'Akidah akhlak'],
    //         ['nama' => 'Fiqih'],
    //         ['nama' => 'SKI'],
    //         ['nama' => 'Pendidikan Pancasila dan Kewarganegaraan'],
    //         ['nama' => 'Bahasa Indonesia'],
    //         ['nama' => 'Bahasa Arab'],
    //         ['nama' => 'Matematika'],
    //         ['nama' => 'IPA'],
    //         ['nama' => 'IPS'],
    //         ['nama' => 'Bahasa Inggris'],
    //         ['nama' => 'Seni Budaya'],
    //         ['nama' => 'Bahasa Jawa'],
    //         ['nama' => 'Prakarya'],
    //         ['nama' => 'Pendidikan aswaja dan ke-NU-an'],
    //         ['nama' => 'Pendidikan Jasmani, olah Raga, dan Kesehatan'],
    //     ]);
    //     for ($i=1; $i <=20 ; $i++) {
    //         DB::table('guru')->insert([
    //             'nama' => 'guru'.$i,
    //             'nik' => 'nik'.$i
    //         ]);
    //     }

    //     for ($i=0; $i <3 ; $i++) {
    //             $idx=7;
    //             DB::table('kelas')->insert([
    //                 ['nama' => $idx+$i.'a','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'b','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'c','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'d','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'e','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'f','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'g','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'h','id_tahun_ajaran' => 1,'id_wali_kelas' => $i+1],
    //             ]);
    //     }

    //     DB::table('orang_tua')->insert([
    //         ['no_kk' => '12345',
    //          'nama_ayah' => 'junaidi',
    //          'nama_ibu' => 'surti',
    //          'pekerjaan_ayah' => 'petani',
    //          'pekerjaan_ibu' => 'guru',
    //          'no_telephone' => '0987654321',
    //          'alamat' => 'jalan skere ajalahda'
    //     ]
    //     ]);

    //     DB::table('murid')->insert([
    //         'nisn' => 'nisn123',
    //         'nis' => 'nis123',
    //         'no_kk' => '12345',
    //         'nama' => 'daniel s b',
    //         'alamat' => 'jalan kerto kediri',
    //         'agama' => 'kristen',
    //     ]);
    //     DB::table('nilai')->insert([
    //         'id_murid' => '1',
    //         'id_tahun_ajaran' => '1',
    //         'id_semester' => '1',
    //         'catatan_walas' => 'semangat belajar',
    //         'total' => 0,
    //         'rata2' => 0,

    //     ]);

    //     DB::table('guru_mapel')->insert([
    //         ['id_guru' => 1,'id_mapel' => 1 ],
    //         ['id_guru' => 2,'id_mapel' => 1 ],
    //         ['id_guru' => 3,'id_mapel' => 3 ],
    //         ['id_guru' => 4,'id_mapel' => 2 ]
    //     ]);

    //     DB::table('kelas_guru')->insert([
    //         ['id_guru' => 1,'id_kelas' => 1 ],
    //         ['id_guru' => 4,'id_kelas' => 1 ],
    //         ['id_guru' => 3,'id_kelas' => 1 ]
    //     ]);

    //     DB::table('kelas_murid')->insert([
    //         ['id_murid' => 1,'id_kelas' => 1 ],
    //         ['id_murid' => 2,'id_kelas' => 1 ],
    //         ['id_murid' => 3,'id_kelas' => 1 ]
    //     ]);

    //     // DB::table('users')->insert([
    //     //     ['username' => 'guru','password' => 'guru123','role'=>'guru'],
    //     //     ['username' => 'murid','password' => 'murid123','role'=>'guru'],
    //     //     ['username' => 'PetugasTU','password' => 'petugasTU','role'=>'TU']
    //     // ]);

    // }
    // testing
    // public function run()
    // {
    //     for ($i=0; $i <3 ; $i++) {
    //             $idx=7;
    //             DB::table('kelas')->insert([
    //                 ['nama' => $idx+$i.'a','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'b','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'c','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'d','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'e','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'f','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'g','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //                 ['nama' => $idx+$i.'h','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],
    //             ]);
    //     }
    //     DB::table('tahun_ajaran')->insert([
    //         ['nama' => $idx+$i.'a','id_tahun_ajaran' => 3,'id_wali_kelas' => $i+1],

    //     ]);
    // }
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            DB::table('ppdb')->insert([
                []
            ]);
        }
    }
}
