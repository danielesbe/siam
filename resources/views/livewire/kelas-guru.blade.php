<div class="col-sm-7">
    <div class="card">
        <div class="card-header">
            <h4>Guru</h4>
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
                        <th class="">Nama</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Mapel</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)

                    <tr>
                        <td>{{$item->nama}}</th>
                        <td>{{$item->nik}}</td>
                        <td>
                            @foreach ($item->mapel as $row)
                            <div class="badge badge-info">{{$row->kode}}</div>
                            @endforeach
                        </td>
                        <td class="row">
                            <form class="" action="{{route('kelas.wali',$id_kelas)}}" method="get">
                                @csrf
                                <input type="hidden" value="{{$item->id}}" name="id_wali_kelas">
                                <button class="btn btn-warning btn-sm">Wali</button>
                            </form>
                            <form class="ml-1" action="{{route('kelas.guru',$id_kelas)}}" method="get">
                                @csrf
                                <input type="hidden" value="{{$item->id}}" name="id_guru">
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
