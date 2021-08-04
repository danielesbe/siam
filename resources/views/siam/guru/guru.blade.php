@extends('layouts.home')
@section('livewireStyle')
@livewireStyles
@endsection
@section('content')
<section class="section">
    <div class="section-header justify-between">
        <h1>Guru</h1>
        {{-- <form class="row" action="{{ route('guru.import') }}" enctype="multipart/form-data" method="post">
            @csrf                ​

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
                <a href="{{route('guruDownload.template')}}" class="btn btn-danger mt-2 ">Download Template</a>
            </div>
        </form> --}}
    </div>

    <div class="section-body">
        <livewire:guru-dt />
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
