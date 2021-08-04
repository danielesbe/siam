@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Kelas</h1>
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

    <div class="section-body">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="{{route('kelas.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" value="{{$tahun}}" class="form-control" name="id_tahun_ajaran" readonly>
                        <div class="form-group">
                            <label>Nama Kelas</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <button class="btn btn-primary">Buat kelas</button>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>

@endsection
