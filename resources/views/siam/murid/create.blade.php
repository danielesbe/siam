@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Murid Baru</h1>
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

    <div class="section-body row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="{{route('murid.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{old('nisn')}}">
                        </div>
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" class="form-control" name="nis" value="{{old('nis')}}">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Tambah Murid</button>

            </div>
        </div>
    </div>
        <div class="col-12 col-md-6 col-lg-6" >
            <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tempat lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{old('alamat')}}">
                        </div>
                        <div class="form-group">
                            <label>No HP Orang tua/Wali</label>
                            <input type="text" class="form-control" name="no_hp_wali" value="{{old('no_hp_wali')}}">
                        </div>
                        </form>

            </div>
        </div>
    </div>
    </div>
</section>

@endsection
