@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1> VERIFIKASI PENDAFTARAN</h1>
    </div>
    <div class="section-body">
        <div class="row justify-center">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body d-flex justify-center">
                        <span class="btn btn-info">Status Terdaftar : {{$filter['terdaftar']}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body d-flex justify-center">
                        <span class="btn btn-primary">Status Terverifikasi : {{$filter['terverifikasi']}}</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body d-flex justify-center">
                        <span class="btn btn-success ">Status Diterima : {{$filter['diterima']}}</span>
                    </div>
                </div>
            </div>
        </div>
        <form class="row ml-1" action="{{ route('ppdb.import') }}" enctype="multipart/form-data" method="post">
            @csrf              ​
        {{-- <input type="hidden" name="id_kelas" value="{{$kelas->id}}"> --}}
            <div class="form-group">
                <label for="" class="">Import Data Murid Diterima</label>
                <div class="div">
                    <input type="file" accept=".xlsx" name="file"
                        class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                </div>
                <p class="text-danger">{{ $errors->first('file') }}</p>
            </div>
            <div class="form-group mt-4 ml-2">
                <button class="btn btn-danger mt-2">Import</button>
            </div>
            <div class="form-group mt-4 ml-2">
                <a href="{{route('ppdb.templateDownload')}}" class="btn btn-danger mt-2 ">Download Template</a>
            </div>
        </form>
        <livewire:ppdb-dt/>
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
