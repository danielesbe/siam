@extends('layouts.home')
@section('css')

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>PENCAPAIAN KOMPETENSI PESERTA DIDIK</h1>
    </div>
    @php
    $tes = isset($kelas);
    @endphp
    <div class="row">
        <div class="col-12">
            <form class=" row" action="{{route('nilaiByMurid.show')}}" method="get">
                @csrf
                <div class="col-sm-3">
                    <div class="input-group ml-2 mb-0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                        </div>
                        <select class="custom-select" name="id_kelas">
                            <option selected>Pilih Kelas</option>
                            @foreach ($listKelas->kelas as $item)
                            <option @if($tes) @if ($kelas->nama ==$item->nama) selected @endif @endif
                                value="{{$item->id}}">{{$item->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group ml-2 mb-0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Pilih Semester</label>
                        </div>
                        <select class="custom-select" name="id_semester">
                            <option value="1" @if($tes)@if($filter['id_semester']==1) selected @endif @endif>1 (Ganjil)
                            </option>
                            <option value="2" @if($tes)@if($filter['id_semester']==2) selected @endif @endif>2 (Genap)
                            </option>

                        </select>
                    </div>
                </div>
                <div class="col-sm-1 ">
                    <button class="btn btn-primary py-2">Tampilkan</button>
                </div>
            </form>
            @if ($tes)
            @foreach ($kelas->murid as $murid)
            <div class="card mt-4">
                <div class="card-body row">
                    <div class="ml-2">
                        <pre>Nama Madrasah         : MTs Ma’arif Bakung Udanawu</pre>
                        <pre>Alamat                : Jl.KH.Zaid No.37 Bakung Udanawu Blitar</pre>

                        <pre>Nama Peserta Didik    : {{$murid->nama}}</pre>
                        <pre>Nomor Induk           : {{$murid->nis}}</pre>
                    </div>
                    <div class="ml-5">
                        <pre>NISN             : {{$murid->nisn}}</pre>
                        <pre>Kelas            : {{$kelas->nama}}</pre>
                        <pre>Semester         : {{$filter['id_semester']}}</pre>
                        <pre>Tahun Pelajaran  : {{$kelas->tahun_ajaran->nama}}</pre>
                    </div>
                </div>
            </div>
            @foreach ($murid->nilai as $nilai)
            <div class="card mt-4">
                @foreach ($nilai->nilai_sikap as $item)
                <div class="card-body">

                    <div class="">
                        <h2 class=" font-black">A. Sikap</h2>
                    </div>
                    <div class="">
                        <h1 class=" ml-4 mt-2 font-black">1. Sikap Spiritual</h1>
                    </div>
                    <div class="ml-4 mt-2">
                        <div class=" table-responsive col-10">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-2" style="text-align:center">Predikat</th>
                                        <th class="col-10" style="text-align:center">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="d-flex">
                                        <td class="col-2" style="text-align:center">{{$item->nilai_spiritual}}</td>
                                        <td class="col-10" style="text-align:center">{{$item->nilai_spiritual_deskripsi}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <h1 class=" ml-4 mt-2 font-black">2. Sikap Sosial</h1>
                    </div>
                    <div class="ml-4 mt-2">
                        <div class=" table-responsive col-10">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-2" style="text-align:center">Predikat</th>
                                        <th class="col-10" style="text-align:center">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="d-flex">
                                        <td class="col-2" style="text-align:center">{{$item->nilai_sosial}}</td>
                                        <td class="col-10" style="text-align:center">{{$item->nilai_sosial_deskripsi}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="card mt-4">
                <div class="card-body">

                    <div class="">
                        <h2 class=" font-black">B. Pengetahuan</h2>
                    </div>
                    <div class="">
                        <h1 class=" ml-3 mt-2 font-black">Ketuntasan Belajar Minimal : 75</h1>
                    </div>
                    <div class=" mt-2">
                        <div class=" table-responsive col-12">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr style="text-align:center">
                                        <th style="width:5%" rowspan="2" style="text-align:center">No</th>
                                        <th style="width:25%" rowspan="2" style="text-align:center">Mata Pelajaran</th>
                                        <th style="width:5%">Nilai</th>
                                        <th style="width:5%">Predikat</th>
                                        <th style="width:45%">Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nilai->nilai_pengetahuan as $key => $row)
                                    <tr >
                                        <td style="width:5%;text-align:center;">{{$key+1}}</td>
                                        <td style="width:25%;text-align:center;">{{$row->mapel->nama}}</td>
                                        <td style="width:5%;text-align:center;" >{{$row->nilai_akhir}}</td>
                                        <td style="width:5%;text-align:center;" >{{$row->predikat}}</td>
                                        <td style="width:45%;text-align:justify;">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" mt-2">
                        <div class=" table-responsive col-7">
                            <table class="table table-bordered table-md">
                                <tbody>

                                    <tr>
                                        <th style="width:25%;text-align:center;">Jumlah Nilai</th>
                                        <th class="font-weight-light" style="text-align:center">{{$nilai->total}}</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center">Rata-rata</td>
                                        <td class="font-weight-light" style="text-align:center">{{$nilai->rata2}}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th style="text-align:center">ranking</td>
                                        <td class="font-weight-light" style="text-align:center"></td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="">
                        <h2 class=" font-black">C. Keterampilan</h2>
                    </div>
                    <div class="">
                        <h1 class=" ml-3 mt-2 font-black">Ketuntasan Belajar Minimal : 75</h1>
                    </div>
                    <div class=" mt-2">
                        <div class=" table-responsive col-12">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr style="text-align:center">
                                        <th style="width:5%" rowspan="2" style="text-align:center">No</th>
                                        <th style="width:25%" rowspan="2" style="text-align:center">Mata Pelajaran</th>
                                        <th style="width:5%">Nilai</th>
                                        <th style="width:5%">Predikat</th>
                                        <th style="width:45%">Deskripsi</th>
                                </thead>
                                <tbody>
                                    @foreach ($nilai->nilai_keterampilan as $key => $row)
                                    <tr style="text-align:center">
                                        <td style="width:5%;">{{$key+1}}</td>
                                        <td style="width:25%;">{{$row->mapel->nama}}</td>
                                        <td style="width:5%;">{{$row->nilai}}</td>
                                        <td style="width:5%;">{{$row->predikat}}</td>
                                        <td style="width:45%;text-align:justify">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="">
                        <h2 class=" font-black">D. Ketidakhadiran</h2>
                    </div>
                    <div class=" mt-2">
                        <div class=" table-responsive col-12">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr style="text-align:center">
                                        <th style="width:5%">No</th>
                                        <th style="width:5%">Tidak Hadir Karena</th>
                                        <th style="width:45%">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($murid->absensi as $row)
                                    <tr style="text-align:center">
                                        <td style="width:10%;">1</td>
                                        <td style="width:45%;">Sakit</td>
                                        <td style="width:45%;">{{$row->sakit}} Hari</td>
                                    </tr>
                                    <tr style="text-align:center">
                                        <td style="width:5%;">2</td>
                                        <td style="width:45%;">Ijin</td>
                                        <td style="width:45%;">{{$row->ijin}} Hari</td>
                                    </tr>
                                    <tr style="text-align:center">
                                        <td style="width:5%;">3</td>
                                        <td style="width:45%;">Alpa</td>
                                        <td style="width:45%;">{{$row->alpa}} Hari</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="">
                        <h2 class=" font-black">E. Catatan Wali Kelas</h2>
                    </div>
                    <div class=" mt-2">
                        <div class=" table-responsive col-12">
                            <table class="table table-bordered table-md">
                                <thead>
                                    @foreach ($murid->catatan as $row)
                                    <tr>
                                        <th>
                                            {{$row->catatan}}
                                        </th>
                                    </tr>
                                    @endforeach
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endforeach
            @endif
        </div>
    </div>

</section>
@endsection
@section('script')
@endsection
