@extends('layouts.ppdb')

@section('livewireStyle')
@livewireStyles
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
        <livewire:ppdb-dt/>
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
