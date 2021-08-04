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
                    <a href="{{route('siam.userCreate')}}" class="btn btn-primary ">Tambah User</a>
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
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th wire:click="sortBy('username')" style="cursor: pointer;">
                                    Username
                                    @include('partials.sort-icon',['field'=>'username'])
                                </th>
                                <th wire:click="sortBy('role')" style="cursor: pointer;">
                                    Role
                                    @include('partials.sort-icon',['field'=>'role'])
                                </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                                <td>{{$item->username}}</td>
                                <td>{{$item->role}}</td>
                                <td>
                                    <div class="badge badge-success">Active</div>
                                </td>
                                <td>

                                    <form action="{{ route('siam.delete', $item->id) }}" method="post">
                                        <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('siam.edit',$item->id)}}" class="btn btn-warning">Edit</a>
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
