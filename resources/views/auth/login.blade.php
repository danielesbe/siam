@extends('layouts.auth')

@section('content')



<div class="card-body">
    <div class="container">
        <div class="row mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                <form method="POST" action="{{route('siam.post_login')}}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" class="form-control" name="username" tabindex="1" required=""
                                autofocus="">
                            <div class="invalid-feedback">
                                Please fill in your username
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">Password</label>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                required="">
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
