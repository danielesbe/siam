@extends('layouts.auth')

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <div class="container">
            <div class="row mx-auto">
                <div class="col">
                <a href="
                {{route('ppdb.pendaftaran')}}
                " class="btn btn-outline-primary btn-round">PPDB</a>
                </div>
                <div class="col">
                <a href="{{route('siam.login')}}" class="btn btn-outline-secondary btn-round">SIAM</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
