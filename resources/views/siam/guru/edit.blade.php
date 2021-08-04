@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit Guru</h1>
    </div>

    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="{{route('guru.update',$guru->id)}}" class="needs-validation" novalidate="">
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
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{$guru->nama}}" required="" name="nama">
                                <div class="invalid-feedback">
                                    Mohon untuk mengisi nama guru
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Nik</label>
                                <input type="text" class="form-control" value="{{$guru->nik}}" required="" name="nik">
                                <div class="invalid-feedback">
                                    Mohon untuk mengisi NIK guru
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-12">
                                <label>Mapel</label>
                                @foreach ($mapel as $item)
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="checkbox" value="{{$item->id}}"
                                        @foreach($guru->mapel as $row) @if ($row->id == $item->id)
                                        checked
                                        @endif @endforeach
                                    id="defaultCheck1" name="mapel[]">
                                    <label class="form-check-label" for="defaultCheck1">
                                        {{$item->nama}}
                                    </label>
                                </div>
                                @endforeach
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
