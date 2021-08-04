@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header justify-between">
        <h1>Kelola Anggota Kelas {{$kelas->nama}} </h1>
        <form class="row" action="{{ route('anggotaKelas.import') }}" enctype="multipart/form-data" method="post">
            @csrf              ​
        <input type="hidden" name="id_kelas" value="{{$kelas->id}}">
            <div class="form-group">
                <label for="" class="">Import Data</label>
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
                <a href="{{route('anggotaKelas.download')}}" class="btn btn-danger mt-2 ">Download Template</a>
            </div>
        </form>
    </div>
    <div class="section-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            @livewire('kelas-guru', ['id_kelas' => $kelas->id])
            @livewire('kelas-murid', ['id_kelas' => $kelas->id])
        </div>
        <div class="row">
            @livewire('kelas-anggota', ['id_kelas' => $kelas->id])
        </div>
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
