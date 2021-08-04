@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Murid</h1>
    </div>

    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="{{route('murid.update',$murid->id)}}" class="needs-validation"
                    novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit</h4>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
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
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>NISN</label>
                                <input type="text" class="form-control" value="{{$murid->nis}}" required=""
                                    name="nisn">
                                <div class="invalid-feedback">
                                    Mohon untuk mengisi NISN
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>NIS</label>
                                <input type="text" class="form-control" value="{{$murid->nisn}}" required=""
                                    name="nis">
                                <div class="invalid-feedback">
                                    Mohon untuk mengisi NIS
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{$murid->nama}}" required=""
                                    name="nama">
                                <div class="invalid-feedback">
                                    Mohon untuk mengisi Nama Siswa
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
