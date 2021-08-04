@extends('layouts.home')

@section('livewireStyle')
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Murid</h1>
    </div>
    <div class="card mt-4">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    @if (session()->has('failures'))
        <div class="row">
            <div class="col-6">
                <table class="table table-danger">
                    <tr>
                        <th>Row</th>
                        <th>Attribute</th>
                        <th>Errors</th>
                        <th>Value</th>
                    </tr>

                    @foreach (session()->get('failures') as $validation)
                        <tr>
                            <td>{{ $validation->row() }}</td>
                            <td>{{ $validation->attribute() }}</td>
                            <td>
                                <ul>
                                    @foreach ($validation->errors() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    @endif
            <form class="card-body row" action="{{ route('murid.import') }}" enctype="multipart/form-data" method="post">
                @csrf                ​

                <div class="form-group">
                    <label for="">Import Data</label>
                    <input type="file" accept=".xlsx" name="file"
                        class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                    <p class="text-danger">{{ $errors->first('file') }}</p>

                </div>
                <div class="form-group mt-4 ml-2">
                    <button class="btn btn-danger mt-2">Import</button>
                </div>
                <div class="form-group mt-4 ml-2">
                    <a href="{{route('muridDownload.template')}}" class="btn btn-danger mt-2 ">Download Template</a>
                </div>
            </form>


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
        @livewire('murid-dt')
        {{-- <livewire:murid-dt /> --}}
    </div>
</section>
@endsection
@section('script')
@livewireScripts
@endsection
