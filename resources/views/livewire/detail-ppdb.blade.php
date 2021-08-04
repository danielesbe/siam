<div wire:ignore.self class="modal fade" id="detailppdb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"data-backdrop="false">

    <div class="modal-dialog" role="document">

       <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Detail Pendaftaran</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">

                <form>

                    <div class="form-group">

                        <input type="hidden" wire:model="ppdb_id">

                        <label for="exampleFormControlInput1">NISN</label>

                        <input type="text" class="form-control" wire:model="nisn" id="exampleFormControlInput1"  readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">No Pendaftaran</label>

                        <input type="text" class="form-control" wire:model="nomor_pendaftaran" id="exampleFormControlInput1" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">NAMA</label>

                        <input type="text" class="form-control" wire:model="nama" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <input type="hidden" wire:model="user_id">

                        <label for="exampleFormControlInput1">Jenis Kelamin</label>

                        <input type="text" class="form-control" wire:model="jenis_kelamin" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">NISN</label>

                        <input type="text" class="form-control" wire:model="nisn" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tempat Lahir</label>

                        <input type="text" class="form-control" wire:model="tempat_lahir" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Tanggal Lahir</label>

                        <input type="text" class="form-control" wire:model="tanggal_lahir" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Peringkat</label>

                        <input type="text" class="form-control" wire:model="peringkat" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Provinsi</label>

                        <input type="text" class="form-control" wire:model="provinsi" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">Kabupaten</label>

                        <input type="text" class="form-control" wire:model="kabupaten" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">Kecamatan</label>

                        <input type="text" class="form-control" wire:model="kecamatan" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Desa</label>

                        <input type="text" class="form-control" wire:model="desa" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Anak Ke</label>

                        <input type="text" class="form-control" wire:model="anak_ke" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Jumlah Saudara Kandung</label>

                        <input type="text" class="form-control" wire:model="jumlah_saudara" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">NO KK</label>

                        <input type="text" class="form-control" wire:model="no_kk" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                    <div class="form-group">

                        <label for="exampleFormControlInput1">Nama Ayah</label>

                        <input type="text" class="form-control" wire:model="nama_ayah" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Nama Ibu</label>

                        <input type="text" class="form-control" wire:model="nama_ibu" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Pekerjaan Ayah</label>

                        <input type="text" class="form-control" wire:model="pekerjaan_ayah" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Pekerjaan Ibu</label>

                        <input type="text" class="form-control" wire:model="pekerjaan_ibu" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">No HP Wali</label>

                        <input type="text" class="form-control" wire:model="no_hp_wali" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Penghasilan rata-rata orangtua</label>

                        <input type="text" class="form-control" wire:model="penghasilan" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Jenis Prestasi</label>

                        <input type="text" class="form-control" wire:model="jenis_prestasi" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Tingkat</label>

                        <input type="text" class="form-control" wire:model="tingkat" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Juara Ke</label>

                        <input type="text" class="form-control" wire:model="juara_ke" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Nama Prestasi</label>

                        <input type="text" class="form-control" wire:model="nama_prestasi" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">NPSN Sekolah</label>

                        <input type="text" class="form-control" wire:model="npsn_sekolah" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Nama Sekolah Asal</label>

                        <input type="text" class="form-control" wire:model="nama_sekolah" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Kecamatan Sekolah Asal</label>

                        <input type="text" class="form-control" wire:model="nama_sekolah" id="exampleFormControlInput1" placeholder="Enter Name" readonly>

                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

                    </div>

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" wire:click.prevent="verifikasi()" class="btn btn-primary" data-dismiss="modal">Verifikasi</button>

            </div>

       </div>

    </div>

</div>
