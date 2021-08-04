<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Daftar Anggota kelas {{$items->nama}} </h4>
        </div>
        <div class="card-body row">
            <table class="table table-bordered col-4 table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Mapel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($items->guru as $guru)
                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$guru->nama}}</td>
                            <td>
                                @foreach ($guru->mapel as $key=>$mapel)
                                @if ($key==1)
                                    ,
                                @endif
                                {{$mapel->kode}}
                                @endforeach
                            </td>
                        <td>
                            <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data guru?');"
                                action="{{ route('kelas.dropGuru', $guru->id) }}" method="post">
                                <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{$items->id}}" name="id_kelas">
                                <button class="btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered col-6 table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Murid</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($items->murid as $murid)
                    <tr>
                        <th>{{$no++}}</td>
                        <td>{{$murid->nis}}</td>
                        <td>{{$murid->nama}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data murid?');"
                                action="{{ route('kelas.dropMurid', $murid->id) }}" method="post">
                                <!-- KONVERSI DARI @ CSRF & @ METHOD AKAN DIJELASKAN DIBAWAH -->
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{$items->id}}" name="id_kelas">
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <table class="table table-bordered col-2 table-sm">
                <thead>
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Wali Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $cek=isset($items->walikelas);
                    @endphp
                    @if ($cek)
                    <tr>
                        <td>{{$items->walikelas->nik}}</td>
                        <td>{{$items->walikelas->nama}}</td>
                    </tr>
                    @endif


                </tbody>
            </table>
        </div>
    </div>
</div>
