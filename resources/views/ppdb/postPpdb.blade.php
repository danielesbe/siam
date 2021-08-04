<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Informasi Akademik MTs Ma'arif</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<script type="text/javascript">
    /*--This JavaScript method for Print command--*/
	function PrintDoc() {
		var toPrint = document.getElementById('kartu');
		var popupWin = window.open('');
		popupWin.document.open();
		popupWin.document.write('<html><title>KARTU Pendaftaran</title></head><body onload="window.print()">')
		popupWin.document.write(toPrint.outerHTML);
		popupWin.document.write('</html>');
		popupWin.document.close();
	}
</script>

<body><br><br>

    <div class="container" style="width:650px ; ">
        <a href="{{route('siam.login')}}"><button class="btn btn-success"><span class="glyphicon glyphicon-home"></span> Halaman
                Login</button></a>&nbsp;<a href="{{route('ppdb.pendaftaran')}}"><button class="btn btn-success"><span
                    class="glyphicon glyphicon-user"></span> Halaman Pendaftaran</button></a>
        <button class="btn btn-success" onClick="PrintDoc()"><span class="glyphicon glyphicon-print"></span> Cetak
            Kartu</button>
        <br><br><br>
    </div>
    </div>

    <div class="container" style="width:800px ; border: 2px solid;" id="kartu">
        <div class="container"
            style="width:95% ; padding: 1px 15px 1px 15px; background: url(../../../images/background/Untitled-2 copy.jpg); ">
            <table width="100%" height="123" id="kartu" style="center: 120px">
                <tr>
                    <th width="50" height="65" align="center" style="center: 80px ; border-bottom: 2px solid;"><img
                            src="{{ asset('storage/maarif-hijau.jpg')}}" width="46" height="46"></th>
                    <th width="373"
                        style="text-align: left; text-valign: center ; border-bottom: 2px solid; width: 355px"><span
                            class="style7" style="font-size: 25px">MTs. MA`ARIF BAKUNG</span><br />
                        <span class="style9" style="font-size: 15px">PENERIMAAN SISWA BARU</span></th>
                    <th width="50" rowspan="2" style="text-align: left; width: 75px"><strong>Nomor
                            Pendaftaran:</strong><br />
                        <table width="100%" border="1" cellpadding="5">
                            <tr>
                                <td width="100%">
                                    <div align="center" class="style3" size="10em"><span
                                            style="font-size: 20pt"><b>&nbsp;&nbsp;&nbsp;{{$input['nomor_pendaftaran']}}&nbsp;&nbsp;&nbsp;</b></span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" border="0" cellpading="2">
                            <tr>
                                <td height="18">
                                    <div align="center"><span style="center">

                                </td>

                                </span>
        </div>
        </td>
        </tr>
        </table>
        <p>
            <div>
                <b>
        </p>
        </th>
        </tr>
        <tr>
            <th height="22" colspan="2" align="left" style="width: 80px">&nbsp;</th>
        </tr>
        <tr>
            <th height="22" colspan="2" align="left" style="width: 100%">&nbsp;</th>
            <th style="text-align: left; width: 75px">&nbsp;</th>
        </tr>
        </table>
        <table width="100%" border="0">
            <tr>
                <td>
                    <div align="center" style="font-size: 20px" class="style5"><strong>KARTU TANDA BUKTI PENDAFTARAN<br>
                            CALON SISWA BARU</strong><br>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="container" id="kartu"
        style="width:750px;  padding: 15px 15px 15px 15px; background: url(../../../images/background/Untitled-2 copy.jpg);">
        <p align="center" class="style4">
        </p>
        <table width="103%">
            <tr align="left">
                <th width="164" rowspan="8" style="font-size: 10pt">
                    <div align="center">
                        <table width="133" height="172" border="1">
                            <tr>
                                <td height="162" width="151">
                                    <div align="center">Foto<br>
                                        3x4</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </th>
                <th width="27" style="font-size: 10pt">&nbsp;</th>
                <th width="157" class="style10" style="font-size: 16px">Nama</th>
                <th style="font-size: 10pt"><span class="style10">:</span></th>
            <th width="380" style="font-size: 16px"> <span class="style10"><strong>{{$input['nama']}}
                        </strong></span></th>
            </tr>
            <tr align="left">
                <th style="font-size: 10pt">&nbsp;</th>
                <th class="style10" style="font-size: 16px">NISN</th>
                <th style="font-size: 16px">:</th>
                <th style="font-size: 16px"><strong>{{$input['nisn']}} </strong></th>
            </tr>
            <tr align="left">
                <th style="font-size: 10pt">&nbsp;</th>
                <th class="style10" style="font-size: 16px">Tempat, Tgl. Lahir</th>
                <th style="font-size: 16px"><span class="style10">:</span></th>
                <th style="font-size: 16px"> <span class="style10"><strong>{{$input['tempat_lahir']}}, {{$input['tanggal_lahir']}}</strong></span>
                </th>
            </tr>
            <tr align="left">
                <th style="font-size: 10pt">&nbsp;</th>
                <th class="style10" style="font-size: 16px">Jenis Kelamin</th>
                <th style="font-size: 16px"><span class="style10">:</span></th>
                <th style="font-size: 16px"> <span class="style10"><strong>{{$input['jenis_kelamin']}}</strong></span></th>
            </tr>
            <tr align="left">
                <th style="font-size: 10pt" valign="top">&nbsp;</th>
                <th valign="top" class="style10" style="font-size: 16px">Alamat</th>
                <th style="font-size: 10pt" width="21" valign="top"><span class="style10">:</span></th>
                <th style="font-size: 16px"> <span class="style10"><strong>Ds. {{$input['desa']->nama}} Kec. {{$input['kecamatan']->nama}} {{$input['kabupaten']->nama}} {{$input['provinsi']->nama}}
                            </strong></span></th>
            </tr>

            <tr align="left">
                <th style="font-size: 10pt">&nbsp;</th>
                <th class="style10" style="font-size: 16px">Sekolah Asal</th>
                <th style="font-size: 16px"><span class="style10">:</span></th>
                <th style="font-size: 16px"><span class="style10">{{$input['nama_sekolah']}}</span></th>
            </tr>
            <tr align="left">
                <th colspan="4" style="font-size: 10pt">&nbsp;</th>
            </tr>
        </table>
        <br>
        <table width="102%" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="194">
                    <div align="center">Tanggal Ujian</div>
                </td>
                <td width="78">&nbsp;</td>
                <td width="501" colspan="4" rowspan="7">
                    <table width="500" border="1" cellspacing="0" cellpadding="5">
                        <tr>
                            <td width="38%">
                                <div align="center"><strong>Waktu</strong></div>
                            </td>
                            <td width="36%">
                                <div align="center"><strong>Materi</strong></div>
                            </td>
                            <td width="26%">
                                <div align="center"><strong>Tanda Tangan<br>
                                        Pengawas Ujian</strong></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">07:00 - 07:30 WIB</div>
                            </td>
                            <td>&nbsp;Verifikasi Pendaftaran</td>
                            <td rowspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <div align="center">07:30 - 09:30 WIB</div>
                            </td>
                            <td><strong>&nbsp;</strong>Mengerjakan Ujian<br>
                                &nbsp; - Matematika<br>&nbsp; - IPA<br>&nbsp; - Bhs. Indonesia<br>&nbsp; - Bhs.
                                Inggris<br>&nbsp; - PAI</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center" class="style4">
                        <table width="100%" border="1" cellpadding="5">
                            <tr>

                                <td>
                                    <div align="center"><strong>
                                            Selasa, 15 Juni 2021 </strong></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td rowspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <div align="center">Lokasi Ujian</div>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="29">
                    <div align="center">
                        <table width="100%" border="1" cellpadding="5">
                            <tr>
                                <td>
                                    <div align="center"><strong>Di Informasikan menyusul<br>
                                            (Terkait Pencegahan COVID-19)</strong></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td rowspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td height="30">&nbsp;</td>
            </tr>
        </table>
        <br>
    </div>
    <div align="left" class="card-footer" style="width:96% ; padding: 1px 15px 1px 15px; border-top: 1px solid">
        &#10148; <span style="font-weight: bold;">Membawa fotocopy KK dan IJAZAH untuk verifikasi</span>
        <br>
        &#10148; Cetaklah Kartu Tanda Bukti Pendaftaran Ini menggunakan Kertas F4 / Folio
        <br>
        &#10148; Jika mengalami kesulitan untuk mencetak silahkan hubungi panitia
        <br>
        &#10148; Ketika Ujian, Bawalah: Kartu Tanda Bukti Pendaftaran dan Perlengkapan tulis (Pensil 2B, Penghapus dan
        Rautan)
        <br>
        &#10148; Bawalah kartu ini ketika <span style="font-weight: bold;">Ujian Seleksi masuk dan Pembayaran daftar
            ulang</span> (jika dinyatakan Lulus)
        <br>
        &#10148; <span style="font-weight: bold;">DIMOHON UNTUK SEGERA LOGIN DAN MERUBAH PASSWORD YANG SUDAH DIGENERATE </span>
        <br>
        &#10148; <span style="font-weight: bold;">Username : {{$input['username']}}</span>
        <br>
        &#10148; <span style="font-weight: bold;">Password : {{$input['username']}}</span>
    </div>


    </div><br>
</body>

</div>
</body>

</html>
