@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah Guru</h1>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="section-body">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="{{route('guru.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                        </div>
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="text" class="form-control" name="nik" value="{{old('nik')}}">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Mapel</label>
                                @foreach ($mapel as $item)
                                <div class="form-check mr-2">
                                <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="defaultCheck1" name="mapel[]">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$item->nama}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>

@endsection
