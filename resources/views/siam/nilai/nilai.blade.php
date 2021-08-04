@extends('layouts.home')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
@section('content')
<section class="section">
    <div class="section-header justify-content-between">
        <h1>NILAI </h1>
        <h1>@if(isset($kelas)) Kelas <span class="text-danger">{{$kelas->nama}}</span> Semester  <span class="text-danger">{{$param['id_semester']}}</span> @endif </h1>
    </div>
    <div class="section-body">
        <div class="row">
            <form class="col-12" action="{{route('nilai.show')}}" method="POST">
                <div class="card">
                    <div class="row mb-10">
                        <div class="col-sm-4">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Tahun Ajaran</label>
                                </div>
                                <select class="custom-select" id="tahun_ajaran" name="tahun_ajaran">
                                    <option selected="">Tahun Ajaran</option>
                                    @foreach ($tahun as $item)
                                    <option  value="{{$item->id}}" >{{$item->nama}} @if($item->status == 1)(active)@endif</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Kelas</label>
                                </div>
                                <select class="custom-select" id="kelas" name="kelas">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group ml-2 mt-2 mb-0">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Semester</label>
                                </div>
                                <select class="custom-select" name="semester">
                                    <option >Pilih Semester</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary inline ml-2 py-2 mt-2">Tampilkan</button>

                    </div>
                </div>
            </form>
        </div>
        @if (isset($kelas))

        <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body row">
                    <a href="{{route('nilai.print',['idKelas'=>$kelas->id,'idTahun'=>$param['id_tahun_ajaran'],'idSemester'=>$param['id_semester']])}}" target="_blank" style="font-size: 1.5rem"  class="fas fa-print mb-2 ml-1"></a>
                    <table class="table table-bordered col-12 table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Jenis Kelamin</th>
                                <th>Nilai rata-rata</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($kelas->murid as $row )
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->nisn}}</td>
                                <td>{{$row->nis}}</td>
                                <td>{{$row->jenis_kelamin}}</td>
                                <td>@foreach($row->nilai as $nilai) {{$nilai->rata2}} @endforeach</td>
                                <td>
                                    <a href="javascript:void(0)" id="detail-nilai"  data-id="{{$row->id}}" data-tahun="{{$param['id_tahun_ajaran']}}" data-semester="{{$param['id_semester']}}" class="btn btn-warning"> detail</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        </div>
        @endif
    </div>
    <!-- Button trigger modal -->
</section>
<!-- Modal -->
@if(isset($kelas))

<div class="modal " id="modal-nilai" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div class="ml-2">
                <pre>Nama Peserta Didik    : <span id="nama">Daniel</span></pre>
                <pre>NIS                   : <span id="nis">Daniel</span></pre>
                <pre>NISN                  : <span id="nisn">Daniel</span></pre>
            </div>
            <div class="ml-5">
                <pre>Kelas            : {{$kelas->nama}}</pre>
                <pre>Semester         : {{$param['id_semester']}}</pre>
                <pre>Tahun Pelajaran  : {{$param['tahun_ajaran']}}</pre>
            </div>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-sm text-center">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Mata Pelajaran</td>
                                <td>UH 1</td>
                                <td>UH 2</td>
                                <td>UH 3</td>
                                <td>UH 4</td>
                                <td>UH 5</td>
                                <td>Nilai Pengetahuan</td>
                                <td>Nilai Keterampilan</td>
                            </tr>
                        </thead>
                        <tbody id="tempel">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
  @endif
@endsection
@push('scripts')
  <script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#tahun_ajaran').on('change', function(){
        $.ajax({
            url:'getKelas',
            method:'POST',
            data:{id_tahun_ajaran:$(this).val()},
            success: function(hasil){
                $('#kelas').html(hasil.data);
            }
        });
    });
    $('body').on('click','#detail-nilai', function(){
        var murid_id = $(this).data("id");
        var tahun = $(this).data("tahun");
        var semester = $(this).data("semester");
        $.ajax({
            url:'getNilaiMurid',
            method:'POST',
            data:{id_murid:murid_id,id_tahun:tahun,id_semester:semester},
            success: function(hasil){
                console.log(hasil);
                $('#nama').text(hasil.murid.nama);
                $('#nis').text(hasil.murid.nis);
                $('#nisn').text(hasil.murid.nisn);
                $('#tempel').html(hasil.nilai);
                $('#modal-nilai').modal('show');
            }
        });

    });
  </script>
@endpush
