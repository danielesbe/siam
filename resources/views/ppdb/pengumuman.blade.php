@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection
@section('css')
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('topnav')
@include('partials.topnav')
@endsection

@section('content')
<section class="section">
    <div class="section-header d-flex justify-around">
        <h1 style="font-size: 1.5rem;">Pengumuman Hasil Seleksi PPDB Dapat Dilihat <br> Pada Tanggal <span class="text-danger">{{$tgl_buka}}</span> sampai <span class="text-danger">{{$tgl_tutup}}</span></h1>
    </div>


</section>
@endsection
@section('script')
@livewireScripts
@endsection
