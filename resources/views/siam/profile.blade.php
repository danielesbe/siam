@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Profile Setting</h1>
    </div>

    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="{{route('siam.profileUpdate')}}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" value="{{auth()->user()->username}}" required=""
                                    readonly name="username">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" value="" required="" name="password" >
                                <div class="invalid-feedback">
                                    Silahkan isi password saat ini
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Password Baru</label>
                                <input type="text" class="form-control" value="" required="" name="passwordNew">
                                <div class="invalid-feedback">
                                    Silahkan isi password baru
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
