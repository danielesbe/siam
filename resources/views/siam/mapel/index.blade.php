@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header justify-content-between">
        <h1>Mata Pelajaran</h1>
        <div >
            <form action="" method="get">
                @csrf
                <a href="{{route('export.mapel')}}" class="btn btn-info mt-2">Export mapel</a>
            </form>
        </div>
    </div>

    <div class="section-body">
        <livewire:mapel-dt />
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
