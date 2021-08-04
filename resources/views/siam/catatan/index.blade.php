@extends('layouts.home')
@section('css')
<style>
    table td {
      position: relative;
    }

    table td textarea,input {
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
@endsection
@section('content')
<section class="section">
    <div class="section-header">
    <h1>Catatan Walas @if (isset($kelas))kelas  <span class=" text-danger">{{$kelas->nama}}</span> Semester <span class=" text-danger">{{$filter['id_semester']}} </span>@endif </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form class="row" action="{{route('catatan.murid')}}" method="get">
                        @csrf
                        <div class="col-sm-3">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                                </div>
                                <select class="custom-select" name="id_kelas">
                                    <option selected>Pilih Kelas</option>
                                    @foreach ($wakelKelas as $item)
                                    <option value="{{$item->id}}"@if (isset($kelas)) @if($kelas->nama==$item->nama)selected @endif @endif>{{$item->nama}}
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
                                    <option value="1"@if(isset($kelas))@if($filter['id_semester']==1) selected @endif @endif>1 (Ganjil)</option>
                                    <option value="2"@if(isset($kelas))@if($filter['id_semester']==2) selected @endif @endif>2 (Genap)</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1 mt-2">
                            <button class="btn btn-primary py-2">Tampilkan</button>
                        </div>
                    </form>
                    <form action="{{route('catatan.store')}}" method="post">
                        @csrf
                        <div class="row justify-content-end">
                            <div class="col-1 mr-4">
                                <button class=" mt-2 btn btn-primary">Simpan</button>
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
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body p-0 mt-2">
                        <div class=" table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr style="text-align:center">
                                        <th  style="width:5%">No</th>
                                        <th  style="width:40%">Nama</th>
                                        <th  style="width:55%">Catatan</th>
                                    </tr>
                                    @if (isset($kelas))
                                    <input type="hidden" value="{{$filter['id_semester']}}" name="id_semester">
                                    @foreach ($kelas->murid as $key=> $murid)
                                    <tr>
                                        <input type="hidden" value="{{$murid->id}}" name="id_murid[]">
                                        <td>{{$key+1}}</td>
                                        <td>{{$murid->nama}}</td>
                                        @forelse ($murid->catatan as $catatan)
                                            <td><input type="text" name="catatan[]" value="{{$catatan->catatan}}"></td>
                                            @empty
                                            <td><input type="text" name="catatan[]" ></td>
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
@section('script')
@endsection
