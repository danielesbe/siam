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
            </div>

            <div class="card-header ">
                <div class=" d-flex justify-content-end">
                    <a href="{{route('murid.create')}}" class="btn btn-primary ">Tambah Murid Baru</a>
                </div>
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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th wire:click="sortBy('nisn')" style="cursor: pointer;">NISN</th>
                                <th wire:click="sortBy('nis')" style="cursor: pointer;">NIS</th>
                                <th wire:click="sortBy('nama')" style="cursor: pointer;">
                                    Nama
                                    @include('partials.sort-icon',['field'=>'nama'])
                                </th>
                                <th>Jenis Kelamin</th>

                                <th>Action</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$item->nisn}}</td>
                                <td>{{$item->nis}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah anda yakin ingin menghapus?');"  action="{{ route('murid.destroy', $item->id) }}" method="post">
                                        <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                        <a href="{{route('murid.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                                        @csrf
                                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
