<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <div class="input-group ml-2 mt-2 mb-0">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Per Page</label>
                        </div>
                        <select wire:model="perPage" class="custom-select">
                            <option>2</option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>25</option>
                        </select>
                    </div>
                </div>
                <form class="col-6 form-inline" method="post" action="{{route('mapel.store')}}">
                    @csrf
                    <label for="">Mata Pelajaran:</label>
                    <input class="form-control mt-2 ml-2" type="text" name="nama">
                    <button class="btn btn-primary inline ml-2 py-2 mt-2">Tambahkan</button>
                </form>
            </div>

            <div class="card-header ">
                <h4></h4>
                <div class="card-header-form">
                    <div class="input-group">
                        <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <span class="btn btn-primary"><i class="fas fa-search"></i></span>
                        </div>
                    </div>

                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th wire:click="sortBy('nama')" style="cursor: pointer;">
                                    Nama Mata Pelajaran
                                    @include('partials.sort-icon',['field'=>'nama'])
                                </th>
                                <th>Action</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <form action="{{ route('mapel.destroy', $item->id) }}" method="post">
                                        <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('mapel.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                    {{-- <a href="{{route('siam.delete',$item->id)}}" class="btn btn-danger">Hapus</a>
                                    --}}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <p>
                            {{$items->links()}}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
