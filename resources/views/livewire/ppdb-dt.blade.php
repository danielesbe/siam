<div class="row">
    @include('livewire.detail-ppdb')
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
                <div class="col-4 mt-2">
                      <div class="form-group">
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                              <input type="radio" wire:model="status" value="terdaftar" class="selectgroup-input">
                              <span class="selectgroup-button">Terdaftar</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" wire:model="status" value="terverifikasi" class="selectgroup-input" checked="">
                            <span class="selectgroup-button">Terverifikasi</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" wire:model="status" value="diterima" class="selectgroup-input">
                            <span class="selectgroup-button">Diterima</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" wire:model="status" value="" class="selectgroup-input">
                            <span class="selectgroup-button">All</span>
                          </label>
                        </div>
                      </div>
                </div>
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
                                <th>No</th>
                                <th>Nomor Pendaftaran</th>
                                <th>NISN</th>
                                <th>Nama Calon Murid</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($items as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->nomor_pendaftaran}}</td>
                                <td>{{$item->nisn}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    @if ($item->status == 'terdaftar')
                                        <span class=" badge badge-info">{{$item->status}}</span>
                                    @endif
                                    @if ($item->status == 'terverifikasi')
                                        <span class=" badge badge-primary">{{$item->status}}</span>
                                    @endif
                                    @if ($item->status == 'diterima')
                                        <span class=" badge badge-success">{{$item->status}}</span>
                                    @endif
                                </td>
                                <td>
                                        @if ($item->status == 'terdaftar')
                                        <button data-toggle="modal" data-target="#detailppdb" wire:click="detailPpdb({{ $item->id }})" class="btn btn-primary">Verifikasi</button>
                                        {{-- <a href="{{route('ppdb.verifikasi',$item->id)}}" class="btn btn-primary">Verifikasi</a> --}}
                                        @endif
                                        @if ($item->status == 'terverifikasi')
                                        <a href="{{route('ppdb.terima',$item->id)}}" class="btn btn-success">Terima</a>
                                        @endif
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
