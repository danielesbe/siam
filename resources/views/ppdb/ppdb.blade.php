@extends('layouts.ppdb')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1> PENDAFTARAN PESERTA DIDIK BARU </h1>
        </div>
        <div class="section-body">
            <form action="{{route('ppdb.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="font-bold text-left" style="font-size: 1.3rem">Tanggal Pendaftaran : </div>
                            <div style="font-size: 1.3rem" class="col text-right mr-10 font-bold ">
                                {{ now()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Calon Peserta Didik</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIK siswa</label>
                                <input name="nik" type="text" class="form-control" maxlength="16"
                                    placeholder="16 Digit Nomor Induk Kependudukan" required value="{{old('nik')}}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input name="nama" type="text" class="form-control" {{old('nama')}}
                                placeholder="Nama Lengkap (Sesuai Akte/Ijazah)"
                                required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>NISN</label>
                                <input name="nisn" type="text" class="form-control" maxlength="10" {{old('nisn')}}
                                    placeholder="10 Digit Nomor Induk Siswa Nasional" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat lahir</label>
                                <input  name="tempat_lahir" type="text" class="form-control inputtags" required {{old('tempat_lahir')}}>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input name="tanggal_lahir" {{old('tanggal_lahir')}} class="date form-control" type="text" required>
                            </div>
                            <div class="form-group">
                                <label>Peringkat kelas(V semester II)</label>
                                <select class="form-control" name="peringkat">
                                   <option >Ranking Lebih dari 5</option>
                                   <option >Ranking 1</option>
                                   <option >Ranking 2</option>
                                   <option >Ranking 3</option>
                                   <option >Ranking 4</option>
                                   <option >Ranking 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Tempat Tinggal</label>
                                <select id="form_prov" class="form-control" name="provinsi">
                                    <option>--Pilih Provinsi</option>
                                    @foreach ($provinsi as $row )
                                    <option value="{{$row->kode}}">{{$row->nama }}</option>
                                    @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <select id="form_kab" class="form-control" name="kabupaten">
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="form_kec" class="form-control" name="kecamatan"></select>
                            </div>
                            <div class="form-group">
                                <select id="form_des" class="form-control" name="desa"></select>
                            </div>
                            {{-- <div class="form-group">
                                <input placeholder="Alamat Lengkap (Nomor Rumah/jalan,RT RW)" name="alamat" type="text" class="form-control" required>
                            </div> --}}

                            <div class="form-group">
                                <label>Anak Ke-</label>
                                <input  name="anak_ke" type="text" class="form-control inputtags" required value="{{old('anak_ke')}}">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Saudara Kandung</label>
                                <input name="jumlah_saudara" {{old('jumlah_saudara')}} type="text" class="form-control inputtags" required>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jenis Prestasi</label>
                                <select name="jenis_prestasi" id="" class="form-control">
                                    <option ></option>
                                    <option >Sains</option>
                                    <option >Seni</option>
                                    <option >Olahraga</option>
                                    <option >Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tingkat</label>
                                <select name="tingkat" id="" class="form-control">
                                    <option ></option>
                                    <option >Kecamatan</option>
                                    <option >Kabupaten</option>
                                    <option >Provinsi</option>
                                    <option >Nasional</option>
                                    <option >Internasional</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Juara Ke</label>
                                <select name="juara_ke" id="" class="form-control">
                                    <option ></option>
                                    <option >1</option>
                                    <option >2</option>
                                    <option >3</option>
                                    <option >Peserta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Prestasi</label>
                                <input name="nama_prestasi" type="text" class="form-control" {{old('nama_prestasi')}}
                                    placeholder="Contoh: Lomba debat bahasa inggris, OSN Tingkat SMP, dll" >
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pilihan Sekolah </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Mendaftar di Sekolah Lain</label>
                                <select name="mendaftar_sekolah_lain" id="" class="form-control">
                                    <option >Hanya Mendaftar di MTs. Ma'arif Bakung</option>
                                    <option >Mendaftar di Sekolah Lain</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama MTs/SMP Lain</label>
                                <input name="mendaftar_sekolah_lain_nama" type="text" class="form-control"
                                    placeholder="Kosongkan jika hanya mendaftar di MTs. Ma'arif Bakung" value="{{old('mendaftar_sekolah_lain_nama')}}">
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Keluarga</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nomor Kartu Keluarga (KK)</label>
                                <input name="no_kk" type="text" class="form-control colorpickerinput" value="{{old('no_kk')}}"
                                    placeholder="16 Digit Nomor Kartu Keluarga" required maxlength="16">
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input placeholder="Nama sesuai KK" name="nama_ayah" type="text" class="form-control" required value="{{old('nama_ayah')}}">
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input placeholder="Nama sesuai KK" name="nama_ibu" value="{{old('nama_ibu')}}" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>NIK Ayah</label>
                                <input maxlength="16" placeholder="16 Digit Nomor Induk Kependudukan" name="nik_ayah" value="{{old('nik_ayah')}}" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>NIK Ibu</label>
                                <input maxlength="16" placeholder="16 Digit Nomor Induk Kependudukan" name="nik_ibu" value="{{old('nik_ibu')}}" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Pekerjaan Ayah</label>
                                <select name="pekerjaan_ayah" class="form-control" required>
                                    <option value="">--Pilih Pekerjaan--</option>
                                    <option value="Tidak Bekerja" >01 Tidak Bekerja</option>
                                    <option value="Pensiunan" >02 Pensiunan</option>
                                    <option value="PNS (Selain poin 05 dan 10)" >03 PNS (Selain poin 05 dan 10)</option>
                                    <option value="TNI/Polisi">04 TNI/Polisi</option>
                                    <option value="Guru/Dosen" >05 Guru/Dosen</option>
                                    <option value="Pegawai Swasta" >06 Pegawai Swasta</option>
                                    <option value="Wiraswasta/Wirausaha" >07 Wiraswasta/Wirausaha</option>
                                    <option value="Pengacara, Hakim/Jaksa/Notaris" >08 Pengacara, Hakim/Jaksa/Notaris</option>
                                    <option value="Seniman/Pelukis/Artis/Sejenisnya" >09 Seniman/Pelukis/Artis/Sejenisnya</option>
                                    <option value="Dokter/Bidan/Perawat" >10 Dokter/Bidan/Perawat</option>
                                    <option value="Pilot/Pramugari" >11 Pilot/Pramugari</option>
                                    <option value="Pedagang" >12 Pedagang</option>
                                    <option value="Petani/Peternak">13 Petani/Peternak</option>
                                    <option value="Nelayan" >14 Nelayan</option>
                                    <option value="Buruh (Tani/Pabrik/Bangunam)">15 Buruh (Tani/Pabrik/Bangunam)</option>
                                    <option value="Sopir/Masinis/Kondektur">16 Sopir/Masinis/Kondektur</option>
                                    <option value="Politikus">17 Politikus</option>
                                    <option value="lainnya">18 lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Ibu</label>
                                <select name="pekerjaan_ibu" class="form-control" required>
                                    <option value="">--Pilih Pekerjaan--</option>
                                    <option value="Tidak Bekerja" >01 Tidak Bekerja</option>
                                    <option value="Pensiunan" >02 Pensiunan</option>
                                    <option value="PNS (Selain poin 05 dan 10)" >03 PNS (Selain poin 05 dan 10)</option>
                                    <option value="TNI/Polisi">04 TNI/Polisi</option>
                                    <option value="Guru/Dosen" >05 Guru/Dosen</option>
                                    <option value="Pegawai Swasta" >06 Pegawai Swasta</option>
                                    <option value="Wiraswasta/Wirausaha" >07 Wiraswasta/Wirausaha</option>
                                    <option value="Pengacara, Hakim/Jaksa/Notaris" >08 Pengacara, Hakim/Jaksa/Notaris</option>
                                    <option value="Seniman/Pelukis/Artis/Sejenisnya" >09 Seniman/Pelukis/Artis/Sejenisnya</option>
                                    <option value="Dokter/Bidan/Perawat" >10 Dokter/Bidan/Perawat</option>
                                    <option value="Pilot/Pramugari" >11 Pilot/Pramugari</option>
                                    <option value="Pedagang" >12 Pedagang</option>
                                    <option value="Petani/Peternak">13 Petani/Peternak</option>
                                    <option value="Nelayan" >14 Nelayan</option>
                                    <option value="Buruh (Tani/Pabrik/Bangunam)">15 Buruh (Tani/Pabrik/Bangunam)</option>
                                    <option value="Sopir/Masinis/Kondektur">16 Sopir/Masinis/Kondektur</option>
                                    <option value="Politikus">17 Politikus</option>
                                    <option value="lainnya">18 lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>No HP Orang Tua/Wali</label>
                                <input name="no_hp_wali" value="{{old('no_hp_wali')}}" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Rata-Rata Penghasilan per Bulan</label>
                                <select name="penghasilan" class="form-control">
                                    <option value="">--Pilih Rata-Rata Penghasilan--</option>
                                    <option > < Rp.500 Ribu</option>
                                    <option >Rp. 500 Ribu - Rp. 1 Juta</option>
                                    <option >Rp. 1 Juta - Rp. 3 Juta</option>
                                    <option >Rp. 3 Juta - Rp. 5 Juta</option>
                                    <option > >Rp. 5 Juta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="hidden" >
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="hidden" >
                            </div>
                            <input type="hidden" name="status" value="terdaftar">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Sekolah Asal</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NPSN Sekolah Asal</label>
                                <input name="npsn_sekolah" value="{{old('npsn_sekolah')}}"  type="text" class="form-control"
                                     required
                                >
                            </div>
                            <div class="form-group">
                                <label>Nama Sekolah Asal</label>
                                <input name="nama_sekolah" value="{{old('nama_sekolah')}}" type="text" class="form-control"
                                    placeholder="Contoh: SDN Kandat 3, MI MA'ARIF BAKUNG" required>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan Sekolah Asal</label>
                                <input name="kec_sekolah" value="{{old('kec_sekolah')}}" type="text" class="form-control"
                                    placeholder="Kecamatan Sekolah Asal" required>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Berkas Pendukung</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="">Foto Akta</label>
                                <div class="div">
                                    <input type="file" name="akta"
                                        class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                                </div>
                                <p class="text-danger">{{ $errors->first('file') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Foto Kartu Keluarga</label>
                                <div class="div">
                                    <input type="file" name="kk"
                                        class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                                </div>
                                <p class="text-danger">{{ $errors->first('file') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="" class="">Foto Rapor SD kelas VI Semester 1</label>
                                <div class="div">
                                    <input type="file" name="rapor"
                                        class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                                </div>
                                <p class="text-danger">{{ $errors->first('file') }}</p>
                            </div>


                        </div>
                    </div>

                    <button id="toggle-modal" class="btn-lg btn-primary">Daftar</button>
                </div>
            </div>
        </form>
        </div>
    </section>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.date').datepicker({
    //    format: 'yyyy-mm-dd'
       format: 'dd-mm-yyyy'
     });
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('#form_prov').on('change', function () {
        $.ajax({
            url: '/getWil',
            method: 'POST',
            data: {id: $(this).val(),data:'kabupaten'},
            success: function (hasil) {
                // console.log(hasil.data);
                $("#form_kab").html(hasil.data);
            }
        })
    });
    $('#form_kab').on('change', function () {
        $.ajax({
            url: '/getWil',
            method: 'POST',
            data: {id: $(this).val(),data:'kecamatan'},
            success: function (hasil) {
                // console.log(hasil.data);
                $("#form_kec").html(hasil.data);
            }
        })
    });
    $('#form_kec').on('change', function () {
        $.ajax({
            url: '/getWil',
            method: 'POST',
            data: {id: $(this).val(),data:'desa'},
            success: function (hasil) {
                // console.log(hasil.data);
                $("#form_des").html(hasil.data);
            }
        })
    });


</script>
@endpush
