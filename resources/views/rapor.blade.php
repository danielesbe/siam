<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Rapor</title>
    <style type="text/css">
        .box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial,
                sans-serif;
            color: #555;
        }

        .box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
            border-collapse: collapse;
        }

        .box .information table td {
            padding: 7px;
        }

        .box .heading td {
            text-align: center;
        }

        .box .item td {
            border: 1px solid black;
            text-align: center;
        }

        .kelompok {
            padding: 7px 0px;
            font-weight: bold;
            border: 1px solid black;
        }

        .jumlah td {
            border: 1px solid black;
        }

        .jumlah td:nth-child(2) {
            text-align: center;
        }

        .ketidakhadiran td {
            border: 1px solid black;
            text-align: center;
        }

        .ttd td {
            padding-right: 60px;
            padding-left: 20px;
            padding-top: 150px;
        }

        .ttd td:nth-child(2) {
            text-align: end;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
        }
    </style>
</head>

<body>
    <body onload="window.print()">
    @foreach ($kelas->murid as $murid )
    <div id="print" class="box pagebreak">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="3">
                    <table>
                        <tr>
                            <td></td>
                            <th style="text-align: center">
                                PENCAPAIAN KOMPETENSI PESERTA DIDIK
                            </th>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr class="padding-bot">
                            <td>Nama Madrasah</td>
                            <td>MTs Ma’arif Bakung Udanawu</td>
                            <td style="text-align: start;">NISN</td>
                            <td style="text-align: end;">{{$murid->nisn}}</td> <br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Alamat Sekolah</td>
                            <td>Jl.KH.Zaid No.37 Bakung Udanawu Blitar</td>
                            <td style="text-align: start;">Kelas</td>
                            <td style="text-align: end;">{{$kelas->nama}}</td> <br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Nama Peserta Didik</td>
                            <td>{{$murid->nama}}</td>
                            <td style="text-align: start;">Semester</td>
                            <td style="text-align: end;">{{$param['id_semester']}}</td><br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Nomor Induk</td>
                            <td>{{$murid->nis}}</td>
                            <td style="text-align: start;">Tahun Pelajaran</td>
                            <td style="text-align: end;">{{$kelas->tahun_ajaran->nama}}</td><br>
                        </tr>
                    </table>
                </td>
            </tr>

            @forelse ($murid->nilai as $nilai )
            <tr class="sikap">
                <td colspan="2">
                    <table>
                        @foreach ($nilai->nilai_sikap as $sikap )
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;"><strong>A. SIKAP</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top:10px;padding-left:15px;
                            padding-bottom: 5px;font-weight: bold;">1. Sikap Spiritual</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 10px;background: #eee; text-align: left;">Predikat</td>
                            <td colspan="3" style="padding: 5px;background: #eee; text-align: center;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;padding-top: 5px; vertical-align: top; ">{{$sikap->nilai_spiritual}}</td>
                            <td colspan="3" style="padding-top: 5px;">{{$sikap->nilai_spiritual_deskripsi}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"
                                style="padding-left: 10px; padding-top: 20px;padding-bottom: 5px;font-weight: bold;">2.
                                Sikap
                                Sosial</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 10px;background: #eee; text-align: left;">Predikat</td>
                            <td colspan="3" style="padding: 5px;background: #eee; text-align: center;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;padding-top: 5px; vertical-align: top;">{{$sikap->nilai_sosial}}</td>
                            <td colspan="3" style="padding-top: 5px;">{{$sikap->nilai_sosial_deskripsi}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;"><strong>B.
                                    Pengetahuan</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding: 10px 0px;">
                                Ketuntasan Belajar Minimal : 75
                            </td>
                        </tr>
                        <tr class="heading" style="border: 1px solid black; ">
                            <td style="border: 1px solid black; padding: 5px;">No</td>
                            <td style="border: 1px solid black; padding: 5px;">Mata Pelajaran</td>
                            <td style="border: 1px solid black;padding: 5px;">Nilai</td>
                            <td style="border: 1px solid black;padding: 5px;">Predikat</td>
                            <td style="border: 1px solid black;padding: 5px;">Deskripsi</td>
                        </tr>
                        @foreach ($nilai->nilai_pengetahuan as $key => $row)
                        <tr class="item">
                            <td>{{$key+1}}</td>
                            <td>{{$row->mapel->nama}}</td>
                            <td>{{$row->nilai_akhir}}</td>
                            <td>{{$row->predikat}}</td>
                            <td>
                                @switch($row->predikat)
                                @case('A')
                                Sangat Baik {{$row->mapel->pengetahuan_deskripsi}}
                                @break
                                @case('B')
                                Baik {{$row->mapel->pengetahuan_deskripsi}}
                                @break
                                @case('C')
                                Cukup {{$row->mapel->pengetahuan_deskripsi}}
                                @break
                                @case('D')
                                Kurang {{$row->mapel->pengetahuan_deskripsi}}
                                @break

                                @endswitch
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td style="padding:20px;"></td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Jumlah Nilai (KI-3)</td>
                            <td colspan="2">{{$nilai->total}}</td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Rata-rata</td>
                            <td colspan="2">{{$nilai->rata2}}</td>
                        </tr>

                        <tr>
                            <td style="padding: 5px;"></td>
                        </tr>

                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>C.Keterampilan</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding: 10px 0px;">
                                Ketuntasan Belajar Minimal : 75
                            </td>
                        </tr>
                        <tr class="heading" style="border: 1px solid black; ">
                            <td style="border: 1px solid black; padding: 5px;">No</td>
                            <td style="border: 1px solid black; padding: 5px;">Mata Pelajaran</td>
                            <td style="border: 1px solid black;padding: 5px;">Nilai</td>
                            <td style="border: 1px solid black;padding: 5px;">Predikat</td>
                            <td style="border: 1px solid black;padding: 5px;">Deskripsi</td>
                        </tr>
                        @foreach ($nilai->nilai_keterampilan as $key => $row)
                        <tr class="item">
                            <td>{{$key+1}}</td>
                            <td>{{$row->mapel->nama}}</td>
                            <td>{{$row->nilai}}</td>
                            <td>{{$row->predikat}}</td>
                            <td>
                                @switch($row->predikat)
                                @case('A')
                                Sangat Terampil {{$row->mapel->keterampilan_deskripsi}}
                                @break
                                @case('B')
                                Terampil {{$row->mapel->keterampilan_deskripsi}}
                                @break
                                @case('C')
                                Cukup Terampil {{$row->mapel->keterampilan_deskripsi}}
                                @break
                                @case('D')
                                Kurang Terampil {{$row->mapel->keterampilan_deskripsi}}
                                @break

                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="padding:20px;"></td>
                        </tr>
                        {{-- <tr class="jumlah">
                            <td colspan="3">Jumlah Nilai (KI-3)</td>
                            <td colspan="2">1407</td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Rata-rata</td>
                            <td colspan="2">93,8</td>
                        </tr> --}}
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>D. Ketidakhadiran</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;"></td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>No</td>
                            <td colspan="2">Tidak Hadir Karena</td>
                            <td colspan="2">Keterangan</td>
                        </tr>
                        @foreach ($murid->absensi as $row)
                        <tr class="ketidakhadiran">
                            <td>1</td>
                            <td colspan="2">Sakit</td>
                            <td colspan="2">{{$row->sakit}} Hari</td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>2</td>
                            <td colspan="2">ijin</td>
                            <td colspan="2">{{$row->ijin}} Hari</td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>3</td>
                            <td colspan="2">Tanpa Keterangan </td>
                            <td colspan="2">{{$row->alpa}} Hari</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="padding: 5px;;"></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>E. Catatan Wali Kelas</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;"></td>
                        </tr>
                        <tr>
                            @foreach ($murid->catatan as $row)
                            <td colspan="5" style="border: 1px solid black; padding: 5px 10px; text-align: left;">
                                {{$row->catatan}}</td>
                            @endforeach
                        </tr>
                        <tr class="ttd">
                            <td colspan="4">Mengetahui, <br>
                                Orang Tua/ Wali Siswa
                            </td>
                            <td colspan="2">Wali Kelas</td>
                        </tr>
                    </table>
                </td>
            </tr>
            @empty
                <tr style="border: 1px solid black; ">
                    <td style="text-align: center" colspan="12">Data Belum diinputkan</td>
                </tr>
            @endforelse
        </table>
    </div>
    @endforeach
</body>

</html>
