@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kelola Kelas</h1>
    </div>

    <div class="section-body">
        <livewire:kelas-dt />
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
