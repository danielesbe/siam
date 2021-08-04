@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tahun Ajaran</h1>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="section-body">
        <livewire:tahun-dt />
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
