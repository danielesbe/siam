@extends('layouts.home')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Setting</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <form method="post" action="{{route('setting.store')}}" >
                @csrf
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Nama Sekolah</label>
                            <input type="text" class="form-control" value="{{$setting->nama}}" required=""
                                 name="nama">

                        </div>
                        <div class="form-group col-md-6 col-12">

                            <label>Alamat Sekolah</label>
                            <input type="text" class="form-control" value="{{$setting->alamat}}" required="" name="alamat">
                            <div class="invalid-feedback">
                                Silahkan isi  terlebih dahulu
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>KKM</label>
                            <input type="text" class="form-control" value="{{$setting->kkm}}" required="" name="kkm">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Nama Kepala Sekolah</label>
                            <input type="text" class="form-control" value="{{$setting->kepala_sekolah}}" required="" name="kepala_sekolah">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Pengumuman Buka</label>
                            <input name="tanggal_pengumuman_buka" class="date form-control" type="text" value="{{$setting->tanggal_pengumuman_buka}}">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Tanggal Pengumuman Tutup</label>
                            <input name="tanggal_pengumuman_tutup" class="date form-control" type="text" value="{{$setting->tanggal_pengumuman_tutup}}">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Tanngal Input Nilai Buka</label>
                            <input name="tanggal_nilai_buka" class="date form-control" type="text" value="{{$setting->tanggal_nilai_buka}}">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Tanngal Input Nilai Tutup</label>
                            <input name="tanggal_nilai_tutup" class="date form-control" type="text" value="{{$setting->tanggal_nilai_tutup}}">
                            <div class="invalid-feedback">
                                Silahkan isi terlebih dahulu
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm-dd'
     });

</script>
@endpush
