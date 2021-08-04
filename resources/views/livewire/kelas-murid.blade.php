<div class="col-sm-5">
    <div class="card">
        <div class="card-header">
            <h4>Murid</h4>
            <div class="card-header-form">
                <div class="input-group">
                    <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <span class="btn btn-primary"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>{{$item->nama}}</th>
                        <td>{{$item->nis}}</td>
                        <td>
                            <form action="{{route('kelas.murid',$id_kelas)}}" method="get">
                                @csrf
                                <input type="hidden" value="{{$item->id}}" name="id_murid">
                                <button class="btn btn-info btn-sm">Add</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
