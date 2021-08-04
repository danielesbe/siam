@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Tambah User</h1>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

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
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <form action="{{route('siam.user')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option selected>Pilih role</option>
                                <option value="TU">TU</option>
                                <option value="guru">Guru</option>
                                <option value="murid">Murid</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Create user</button>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>

@endsection
