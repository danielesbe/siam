@extends('layouts.home')
@section('css')
<style>
table td {
  position: relative;
}

table td input {
  position: absolute;
  display: block;
  top:0;
  left:0;
  margin: 0;
  height: 100%;
  width: 100%;
  border: none;
  padding: 10px;
  box-sizing: border-box;
}
</style>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        @php
            $tes = isset($kelas);
        @endphp
    <h1>Nilai Pengetahuan @if ($tes)kelas  <span class=" text-danger">{{$kelas->nama}}</span> Semester <span class=" text-danger">{{$filter['id_semester']}} </span>@endif </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="row" action="{{route('nilaiPengetahuanKelas.index')}}" method="get">
                        @csrf
                        <div class="col-sm-3">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                                </div>
                                <select class="custom-select" name="id_kelas">
                                    <option selected>Pilih Kelas</option>
                                    @foreach ($kelasByGuru->kelas as $item)
                                    <option value="{{$item->id}}"@if ($tes) @if($kelas->nama==$item->nama)selected @endif @endif>{{$item->nama}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Semester</label>
                                </div>
                                <select class="custom-select" name="id_semester">
                                    <option value="1"@if($tes)@if($filter['id_semester']==1) selected @endif @endif>1 (Ganjil)</option>
                                    <option value="2"@if($tes)@if($filter['id_semester']==2) selected @endif @endif>2 (Genap)</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1 mt-2">
                            <button class="btn btn-primary py-2">Tampilkan</button>
                        </div>
                    </form>
                    <form action="{{route('nilaiPengetahuan.store')}}" method="post">
                        @csrf
                        <div class="row justify-content-end">
                            <div class="col-11 row">
                                <a href="{{route('tambahUh')}}" class="ml-4 mt-2 btn btn-success">Tambah UH</a>
                                <a href="{{route('kurangUh')}}" class="ml-2 mt-2 btn btn-danger">Delete UH</a>
                                {{-- <button id="tambah" class="ml-2 mt-2 btn btn-success">Tambah Tugas</button>
                                <button id="tambah" class="ml-2 mt-2 btn btn-danger">Delete Tugas</button> --}}
                                </div>
                            <div class="col-1 mr-2">
                                <button type="submit" class=" mt-2 btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    @if (session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                    @endif
                    <div class="card-body p-0 mt-2">
                        <div class=" table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr style="text-align:center">
                                        <th class="align-middle" rowspan="2">No</th>
                                        <th class="align-middle" rowspan="2">NIS</th>
                                        <th class="align-middle" rowspan="2">Nama</th>
                                        @php
                                            if(isset($filter['uh'])){
                                                $p=$filter['uh']-3+7;
                                                $k=$filter['uh']-3+4;
                                            }
                                            else{
                                                $p=5;
                                                $k=2;
                                            }
                                        @endphp
                                        <th colspan="{{$p}}">Pengetahuan</th>
                                        <th  colspan="{{$k}}">Keterampilan</th>
                                    </tr>
                                    <tr style="text-align:center">
                                        @if (isset($filter['uh']))
                                        @for ($i=1;$i<=$filter['uh'];$i++)
                                        <th>UH{{$i}}</th>
                                        @endfor
                                        @else
                                        <th>UH</th>
                                        @endif
                                        <th>TUGAS</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>NA</th>
                                        <th>Praktek</th>
                                        <th>NA</th>
                                    </tr>

                                    @php
                                    $count=1;
                                    $isTouch = isset($kelas);
                                    @endphp

                                @if ($isTouch)
                                    <input type="hidden" value="{{$filter['id_semester']}}" name="id_semester">
                                    @foreach ($kelas->murid as $murid)
                                    <tr style="text-align:center">
                                    <input type="hidden" value="{{$murid->id}}" name="id_murid[]">
                                        <td>{{$count++}}</td>
                                        <td>{{$murid->nis}}</td>
                                        <td  style="text-align:left">{{$murid->nama}}</td>
                                        @forelse ($murid->nilai as $nilai)
                                            @forelse ($nilai->nilai_pengetahuan as $pengetahuan)
                                            @for ($i=1;$i<=$filter['uh'];$i++)
                                            @php
                                                $nama="uh".$i."[]";
                                                $value="uh_".$i;
                                            @endphp
                                            <td><input type="text" name={{$nama}} value="{{$pengetahuan->$value}}"></td>
                                            @endfor
                                            <td><input type="text" name="tugas[]" value="{{$pengetahuan->tugas}}"></td>
                                            <td><input type="text" name="uts[]" value="{{$pengetahuan->uts}}"></td>
                                            <td><input type="text" name="uas[]" value="{{$pengetahuan->uas}}"></td>
                                            <th>{{$pengetahuan->nilai_akhir}}</th>
                                            @empty
                                            @for ($i=1;$i<=$filter['uh'];$i++)
                                            @php
                                                $nama="uh".$i."[]";
                                            @endphp
                                            <td><input type="text" name={{$nama}} ></td>
                                            @endfor
                                            <td><input type="text" name="tugas[]"></td>
                                            <td><input type="text" name="uts[]"></td>
                                            <td><input type="text" name="uas[]"></td>
                                            <td></td>
                                            @endforelse

                                            @forelse ($nilai->nilai_keterampilan as $keterampilan)
                                            <td><input type="text" name="praktek[]" value="{{$keterampilan->nilai}}"></td>
                                            <td>{{$keterampilan->predikat}}</td>
                                            @empty
                                            <td><input type="text" name="praktek[]"></td>
                                            <td></td>
                                            @endforelse

                                            @empty
                                            <td><input type="text" name="uh1[]" ></td>
                                            <td><input type="text" name="uh2[]"></td>
                                            <td><input type="text" name="uh3[]"></td>
                                            <td><input type="text" name="tugas[]"></td>
                                            <td><input type="text" name="uts[]"></td>
                                            <td><input type="text" name="uas[]"></td>
                                            <td></td>
                                            <td><input type="text" name="praktek[]"></td>
                                            <td></td>
                                        @endforelse
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div>
                                <p>

                                </p>
                            </div>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
// $("#tambah").click(function(){
//     $("#judul").after('<th>UH4</th>');
//     $("#tabel").after("<td><input type='text' name='uh4[]' value=''></td>");
// });
    $("#tambah").on("click", function(){
        $("#judul").after('<th>UH4</th>');
        $("#tabel").after("<td><input type='text' name='uh4[]' value=''></td>");
    });
</script>
@endpush
@section('script')
@endsection
