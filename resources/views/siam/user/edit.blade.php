@extends('layouts.home')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>User Setting</h1>
    </div>

    <div class="section-body">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
            <form method="post" action="{{route('siam.userUpdate',$user->id)}}" class="needs-validation" novalidate="">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Edit</h4>
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
                                <input type="text" class="form-control" value="{{$user->username}}" required="" readonly
                                    name="username">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">

                                <label>Password </label>
                                <input type="password" class="form-control" value="" name="password">
                                <div class="alert alert-info mt-2 ">
                                    Kosongi password jika tidak ingin mengganti password
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option @if ($user->role == 'TU')selected @endif value="TU">TU</option>
                                    <option @if ($user->role == 'guru')selected @endif value="guru">Guru</option>
                                    <option @if ($user->role == 'murid')selected @endif value="murid">Murid</option>
                                </select>
                            </div>
                        </div>
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
