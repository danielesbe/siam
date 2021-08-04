@extends('layouts.home')
@section('livewireStyle')

@livewireStyles
@endsection
@section('css')
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

{{-- @section('topnav')
    @include('partials.topnav')
@section('leftnav')
    @include('partials.sidebar')
@endsection --}}

@section('content')
    <section class="section">
        <div class="section-header">
            <h1> Hasil Seleksi</h1>
        </div>
        <div class="row justify-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h1 style="font-size: 1.2rem;" class=" text-bold">
                            Data Murid Pendaftar
                        </h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">Nomor Pendaftaran</div>
                            <div class="col">{{$ppdb->nomor_pendaftaran}}</div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col">Nama Murid</div>
                            <div class="col">{{$ppdb->nama}}</div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col">NISN Murid</div>
                            <div class="col">{{$ppdb->nisn}}</div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col">Asal Sekolah</div>
                            <div class="col">{{$ppdb->nama_sekolah}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($ppdb->status=='diterima')
        <div class="row justify-center">
            <div class="col-8">
                <div class="card">
                    <div style="background-color: green" class="card-body rounded">
                        <h1 class=" text-white" >Selamat Anda Dinyatakan <span class=" bold"> LULUS </span> Seleksi</h1>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-center">
            <div class="col-8">
                <div class="card">
                    <div style="background-color: red" class="card-body rounded">
                        <h1 class=" text-white" >Anda dinyatakan <span class=" bold"> TIDAK </span> lulus seleksi</h1>
                    </div>
                </div>
            </div>
        </div>
        @endif


    </section>
@endsection
@section('script')
@livewireScripts
@endsection


