@extends('layouts.home')

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
        <h1> DATA PENDAFTARAN </h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="section-body">
        <form action="{{route('ppdb.update')}}" method="post" >
            @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="font-bold text-left" style="font-size: 1.3rem">No Pendaftaran : </div>
                        <div style="font-size: 1.3rem" class="col text-right mr-10 font-bold ">
                            {{ $dataPendaftar->nomor_pendaftaran}}
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
                                placeholder="16 Digit Nomor Induk Kependudukan" required value="{{$dataPendaftar->nik}}"
                            >
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" value="{{$dataPendaftar->nama}}"
                            placeholder="Nama Lengkap (Sesuai Akte/Ijazah)"
                            required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin">
                                <option {{$dataPendaftar->jenis_kelamin=='L'?'selected="selected"': ''}} value="L">Laki-laki</option>
                                <option {{$dataPendaftar->jenis_kelamin=='P'?'selected="selected"': ''}} value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>NISN</label>
                            <input name="nisn" value="{{$dataPendaftar->nisn}}" type="text" class="form-control" maxlength="10"
                                placeholder="10 Digit Nomor Induk Siswa Nasional" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat lahir</label>
                            <input  name="tempat_lahir" value="{{$dataPendaftar->tempat_lahir}}" type="text" class="form-control inputtags" required {{old('tempat_lahir')}}>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input name="tanggal_lahir" value="{{$dataPendaftar->tanggal_lahir}}" class="date form-control" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Peringkat kelas(V semester II)</label>
                            <select class="form-control" name="peringkat">
                               <option {{$dataPendaftar->peringkat=='Ranking Lebih dari 5'? 'selected="selected"':''}} >Ranking Lebih dari 5</option>
                               <option {{$dataPendaftar->peringkat=='Ranking 1'? 'selected="selected"':''}}  >Ranking 1</option>
                               <option {{$dataPendaftar->peringkat=='Ranking 2'? 'selected="selected"':''}}  >Ranking 2</option>
                               <option {{$dataPendaftar->peringkat=='Ranking 3'? 'selected="selected"':''}}  >Ranking 3</option>
                               <option {{$dataPendaftar->peringkat=='Ranking 4'? 'selected="selected"':''}}  >Ranking 4</option>
                               <option {{$dataPendaftar->peringkat=='Ranking 5'? 'selected="selected"':''}}  >Ranking 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat Tempat Tinggal</label>
                            <select id="form_prov" class="form-control" name="provinsi">
                                <option>--Pilih Provinsi</option>
                                @foreach ($kecamatan as $row )
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
                            <input  name="anak_ke"value="{{$dataPendaftar->anak_ke}}" type="text" class="form-control inputtags" required >
                        </div>
                        <div class="form-group">
                            <label>Jumlah Saudara Kandung</label>
                            <input name="jumlah_saudara" value="{{$dataPendaftar->jumlah_saudara}}" type="text" class="form-control inputtags" required>
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
                                <option {{$dataPendaftar->jenis_prestasi=='Sains'? 'selected="selected"':''}} >Sains</option>
                                <option {{$dataPendaftar->jenis_prestasi=='Seni'? 'selected="selected"':''}}  >Seni</option>
                                <option {{$dataPendaftar->jenis_prestasi=='Olahraga'? 'selected="selected"':''}}  >Olahraga</option>
                                <option {{$dataPendaftar->jenis_prestasi=='Lainnya'? 'selected="selected"':''}}  >Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tingkat</label>
                            <select name="tingkat" id="" class="form-control">
                                <option ></option>
                                <option {{$dataPendaftar->tingkat=='Kecamatan'? 'selected="selected"':''}} >Kecamatan</option>
                                <option {{$dataPendaftar->tingkat=='Kabupaten'? 'selected="selected"':''}} >Kabupaten</option>
                                <option {{$dataPendaftar->tingkat=='Provinsi'? 'selected="selected"':''}} >Provinsi</option>
                                <option {{$dataPendaftar->tingkat=='Nasional'? 'selected="selected"':''}} >Nasional</option>
                                <option {{$dataPendaftar->tingkat=='Internasional'? 'selected="selected"':''}}>Internasional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Juara Ke</label>
                            <select name="juara_ke" id="" class="form-control">
                                <option ></option>
                                <option {{$dataPendaftar->juara_ke=='1'? 'selected="selected"':''}} >1</option>
                                <option {{$dataPendaftar->juara_ke=='2'? 'selected="selected"':''}} >2</option>
                                <option {{$dataPendaftar->juara_ke=='3'? 'selected="selected"':''}} >3</option>
                                <option {{$dataPendaftar->juara_ke=='Peserta'? 'selected="selected"':''}} >Peserta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Prestasi</label>
                            <input name="nama_prestasi" value="{{$dataPendaftar->nama_prestasi}}" type="text" class="form-control"
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
                                <option {{$dataPendaftar->mendaftar_sekolah_lain=='Hanya Mendaftar di MTs. Maarif Bakung'? 'selected="selected"':''}}>Hanya Mendaftar di MTs. Ma'arif Bakung</option>
                                <option {{$dataPendaftar->mendaftar_sekolah_lain=='Mendaftar di Sekolah Lain'? 'selected="selected"':''}} >Mendaftar di Sekolah Lain</option>
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
                            <input name="no_kk" value="{{$dataPendaftar->no_kk}}" type="text" class="form-control colorpickerinput" value="{{old('no_kk')}}"
                                placeholder="16 Digit Nomor Kartu Keluarga" required maxlength="16">
                        </div>
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input placeholder="Nama sesuai KK" value="{{$dataPendaftar->nama_ayah}}" name="nama_ayah" type="text" class="form-control" required value="{{old('nama_ayah')}}">
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input placeholder="Nama sesuai KK" name="nama_ibu" value="{{$dataPendaftar->nama_ibu}}" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIK Ayah</label>
                            <input maxlength="16" placeholder="16 Digit Nomor Induk Kependudukan" name="nik_ayah" value="{{$dataPendaftar->nik_ayah}}" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIK Ibu</label>
                            <input maxlength="16" placeholder="16 Digit Nomor Induk Kependudukan" name="nik_ibu" value="{{$dataPendaftar->nik_ibu}}" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <select name="pekerjaan_ayah" class="form-control" required>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Tidak Bekerja'? 'selected="selected"':''}}
                                    value="Tidak Bekerja"
                                >01 Tidak Bekerja</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Pensiunan'? 'selected="selected"':''}}
                                    value="Pensiunan">02 Pensiunan</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='PNS (Selain poin 05 dan 10)'? 'selected="selected"':''}}
                                    value="PNS">03 PNS (Selain poin 05 dan 10)</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='TNI/Polisi'? 'selected="selected"':''}}
                                    value="TNI/Polisi">04 TNI/Polisi</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Guru/Dosen'? 'selected="selected"':''}}
                                    value="Guru/Dosen">05 Guru/Dosen</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Pegawai Swasta'? 'selected="selected"':''}}
                                    value="Pegawai Swasta">06 Pegawai Swasta</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Wiraswasta/Wirausaha'? 'selected="selected"':''}}
                                    value="Wiraswasta/Wirausaha" >07 Wiraswasta/Wirausaha</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Pengacara, Hakim/Jaksa/Notaris'? 'selected="selected"':''}}
                                    value="Pengacara, Hakim/Jaksa/Notaris">08 Pengacara, Hakim/Jaksa/Notaris</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Seniman/Pelukis/Artis/Sejenisnya'? 'selected="selected"':''}}
                                    value="Seniman/Pelukis/Artis/Sejenisnya">09 Seniman/Pelukis/Artis/Sejenisnya</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Dokter/Bidan/Perawat'? 'selected="selected"':''}}
                                    value="Dokter/Bidan/Perawat">10 Dokter/Bidan/Perawat</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Pilot/Pramugari'? 'selected="selected"':''}}
                                    value="Pilot/Pramugari" >11 Pilot/Pramugari</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Pedagang'? 'selected="selected"':''}}
                                    value="Pedagang">12 Pedagang</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Petani/Peternak'? 'selected="selected"':''}}
                                    value="Petani/Peternak">13 Petani/Peternak</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Nelayan'? 'selected="selected"':''}}
                                    value="Nelayan">14 Nelayan</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Buruh (Tani/Pabrik/Bangunam)'? 'selected="selected"':''}}
                                    value="Buruh (Tani/Pabrik/Bangunam)">15 Buruh (Tani/Pabrik/Bangunam)</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Sopir/Masinis/Kondektur'? 'selected="selected"':''}}
                                    value="Sopir/Masinis/Kondektur" >16 Sopir/Masinis/Kondektur</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='Politikus'? 'selected="selected"':''}}
                                    value="Politikus">17 Politikus</option>
                                <option {{$dataPendaftar->pekerjaan_ayah=='lainnya'? 'selected="selected"':''}}
                                    value="lainnya">18 lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <select name="pekerjaan_ibu" class="form-control" required>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Tidak Bekerja'? 'selected="selected"':''}}
                                    value="Tidak Bekerja"
                                >01 Tidak Bekerja</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Pensiunan'? 'selected="selected"':''}}
                                    value="Pensiunan">02 Pensiunan</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='PNS (Selain poin 05 dan 10)'? 'selected="selected"':''}}
                                    value="PNS">03 PNS (Selain poin 05 dan 10)</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='TNI/Polisi'? 'selected="selected"':''}}
                                    value="TNI/Polisi">04 TNI/Polisi</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Guru/Dosen'? 'selected="selected"':''}}
                                    value="Guru/Dosen">05 Guru/Dosen</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Pegawai Swasta'? 'selected="selected"':''}}
                                    value="Pegawai Swasta">06 Pegawai Swasta</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Wiraswasta/Wirausaha'? 'selected="selected"':''}}
                                    value="Wiraswasta/Wirausaha" >07 Wiraswasta/Wirausaha</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Pengacara, Hakim/Jaksa/Notaris'? 'selected="selected"':''}}
                                    value="Pengacara, Hakim/Jaksa/Notaris">08 Pengacara, Hakim/Jaksa/Notaris</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Seniman/Pelukis/Artis/Sejenisnya'? 'selected="selected"':''}}
                                    value="Seniman/Pelukis/Artis/Sejenisnya">09 Seniman/Pelukis/Artis/Sejenisnya</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Dokter/Bidan/Perawat'? 'selected="selected"':''}}
                                    value="Dokter/Bidan/Perawat">10 Dokter/Bidan/Perawat</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Pilot/Pramugari'? 'selected="selected"':''}}
                                    value="Pilot/Pramugari" >11 Pilot/Pramugari</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Pedagang'? 'selected="selected"':''}}
                                    value="Pedagang">12 Pedagang</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Petani/Peternak'? 'selected="selected"':''}}
                                    value="Petani/Peternak">13 Petani/Peternak</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Nelayan'? 'selected="selected"':''}}
                                    value="Nelayan">14 Nelayan</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Buruh (Tani/Pabrik/Bangunam)'? 'selected="selected"':''}}
                                    value="Buruh (Tani/Pabrik/Bangunam)">15 Buruh (Tani/Pabrik/Bangunam)</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Sopir/Masinis/Kondektur'? 'selected="selected"':''}}
                                    value="Sopir/Masinis/Kondektur" >16 Sopir/Masinis/Kondektur</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='Politikus'? 'selected="selected"':''}}
                                    value="Politikus">17 Politikus</option>
                                <option {{$dataPendaftar->pekerjaan_ibu=='lainnya'? 'selected="selected"':''}}
                                    value="lainnya">18 lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>No HP Orang Tua/Wali</label>
                            <input name="no_hp_wali" value="{{$dataPendaftar->no_hp_wali}}" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Rata-Rata Penghasilan per Bulan</label>
                            <select name="penghasilan" class="form-control">
                                <option value="">--Pilih Rata-Rata Penghasilan--</option>
                                <option {{$dataPendaftar->penghasilan=='< Rp.500 Ribu<'? 'selected = "selected"':''}} > < Rp.500 Ribu</option>
                                <option {{$dataPendaftar->penghasilan=='Rp. 500 Ribu - Rp. 1 Juta'? 'selected = "selected"':''}} >Rp. 500 Ribu - Rp. 1 Juta</option>
                                <option {{$dataPendaftar->penghasilan=='Rp. 1 Juta - Rp. 3 Juta'? 'selected = "selected"':''}} >Rp. 1 Juta - Rp. 3 Juta</option>
                                <option {{$dataPendaftar->penghasilan=='Rp. 3 Juta - Rp. 5 Juta'? 'selected = "selected"':''}} >Rp. 3 Juta - Rp. 5 Juta</option>
                                <option {{$dataPendaftar->penghasilan=='>Rp. 5 Juta'? 'selected = "selected"':''}} > >Rp. 5 Juta</option>
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
                            <input name="npsn_sekolah" value="{{$dataPendaftar->npsn_sekolah}}"  type="text" class="form-control"
                                 required
                            >
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah Asal</label>
                            <input name="nama_sekolah" value="{{$dataPendaftar->nama_sekolah}}" type="text" class="form-control"
                                placeholder="Contoh: SDN Kandat 3, MI MA'ARIF BAKUNG" required>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan Sekolah Asal</label>
                            <input name="kec_sekolah" value="{{$dataPendaftar->kec_sekolah}}" type="text" class="form-control"
                                placeholder="Kecamatan Sekolah Asal" required>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="hidden" >
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="hidden">
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

                <button id="toggle-modal" class="btn-lg btn-primary">Simpan</button>
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
