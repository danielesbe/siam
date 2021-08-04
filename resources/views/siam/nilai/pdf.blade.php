<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Rapor</title>
    <style type="text/css">
        .box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial,
                sans-serif;
            color: #555;
        }

        .box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
            border-collapse: collapse;
        }

        .box .information table td {
            padding: 7px;
        }

        .box .heading td {
            text-align: center;
        }

        .box .item td {
            border: 1px solid black;
            text-align: center;
        }

        .kelompok {
            padding: 7px 0px;
            font-weight: bold;
            border: 1px solid black;
        }

        .jumlah td {
            border: 1px solid black;
        }

        .jumlah td:nth-child(2) {
            text-align: center;
        }

        .ketidakhadiran td {
            border: 1px solid black;
            text-align: center;
        }

        .ttd td {
            padding-right: 60px;
            padding-left: 20px;
            padding-top: 150px;
        }

        .ttd td:nth-child(2) {
            text-align: end;
        }

        table {
            page-break-inside: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
        }
    </style>
</head>

<body>
    <div id="print" class="box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="3">
                    <table>
                        <tr>
                            <td></td>
                            <th style="text-align: center">
                                PENCAPAIAN KOMPETENSI PESERTA DIDIK
                            </th>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr class="padding-bot">
                            <td>Nama Madrasah</td>
                            <td>MTs Ma’arif Bakung Udanawu</td>
                            <td style="text-align: start;">NISN</td>
                            <td style="text-align: end;">0079962165</td> <br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Alamat Sekolah</td>
                            <td>Jl.KH.Zaid No.37 Bakung Udanawu Blitar</td>
                            <td style="text-align: start;">Kelas</td>
                            <td style="text-align: end;">7J</td> <br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Nama Peserta Didik</td>
                            <td>TAHTA AMALIA SALWA</td>
                            <td style="text-align: start;">Semester</td>
                            <td style="text-align: end;">1 (Satu)</td><br>
                        </tr>
                        <tr class="padding-bot">
                            <td>Nomor Induk</td>
                            <td>121235050018190054</td>
                            <td style="text-align: start;">Tahun Pelajaran</td>
                            <td style="text-align: end;">2019/2020</td><br>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="sikap">
                <td colspan="2">
                    <table>
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;"><strong>A. SIKAP</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top:10px;padding-left:15px;
                            padding-bottom: 5px;font-weight: bold;">1. Sikap Spiritual</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 10px;background: #eee; text-align: left;">Predikat</td>
                            <td colspan="3" style="padding: 5px;background: #eee; text-align: center;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;padding-top: 5px; vertical-align: top; ">Baik</td>
                            <td colspan="3" style="padding-top: 5px;">Baik dalam berdoa, memberi salam, beribadah,
                                bersyukur atas nikmat Alloh Yang Maha Esa
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"
                                style="padding-left: 10px; padding-top: 20px;padding-bottom: 5px;font-weight: bold;">2.
                                Sikap
                                Sosial</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 10px;background: #eee; text-align: left;">Predikat</td>
                            <td colspan="3" style="padding: 5px;background: #eee; text-align: center;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-left: 15px;padding-top: 5px; vertical-align: top;">Baik</td>
                            <td colspan="3" style="padding-top: 5px;">Baik dalam berperilaku jujur, disiplin, tanggung
                                jawab, toleransi, gotong royong, santun/sopan, dan percaya diri
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;"><strong>B.
                                    Pengetahuan</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding: 10px 0px;">
                                Ketuntasan Belajar Minimal : 75
                            </td>
                        </tr>
                        <tr class="heading" style="border: 1px solid black; ">
                            <td style="border: 1px solid black; padding: 5px;">No</td>
                            <td style="border: 1px solid black; padding: 5px;">Mata Pelajaran</td>
                            <td style="border: 1px solid black;padding: 5px;">Nilai</td>
                            <td style="border: 1px solid black;padding: 5px;">Predikat</td>
                            <td style="border: 1px solid black;padding: 5px;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok A
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Al-Qur’an Hadits</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>
                        <tr class="item">
                            <td>2</td>
                            <td>Akidah Akhlak</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>3</td>
                            <td>SKI</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>4</td>
                            <td>Fiqih</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>5</td>
                            <td>PPKN</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>5</td>
                            <td>Bahasa Indonesia</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>6</td>
                            <td>Bahasa Arab</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>6</td>
                            <td>Matematika</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>7</td>
                            <td>IPA</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>8</td>
                            <td>IPS</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>9</td>
                            <td>Bahasa Inggris</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok B
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Seni Budaya</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>
                        <tr class="item" id="pagebreak">
                            <td>2</td>
                            <td>PENJASKES</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item" id="pagebreak">
                            <td>3</td>
                            <td>Prakarya</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok C
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Bahasa Jawa</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:20px;"></td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Jumlah Nilai (KI-3)</td>
                            <td colspan="2">1407</td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Rata-rata</td>
                            <td colspan="2">93,8</td>
                        </tr>

                        <tr>
                            <td style="padding: 5px;"></td>
                        </tr>

                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>C.Keterampilan</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding: 10px 0px;">
                                Ketuntasan Belajar Minimal : 75
                            </td>
                        </tr>
                        <tr class="heading" style="border: 1px solid black; ">
                            <td style="border: 1px solid black; padding: 5px;">No</td>
                            <td style="border: 1px solid black; padding: 5px;">Mata Pelajaran</td>
                            <td style="border: 1px solid black;padding: 5px;">Nilai</td>
                            <td style="border: 1px solid black;padding: 5px;">Predikat</td>
                            <td style="border: 1px solid black;padding: 5px;">Deskripsi</td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok A
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Al-Qur’an Hadits</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>
                        <tr class="item">
                            <td>2</td>
                            <td>Akidah Akhlak</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>3</td>
                            <td>SKI</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>4</td>
                            <td>Fiqih</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>5</td>
                            <td>PPKN</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>5</td>
                            <td>Bahasa Indonesia</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>6</td>
                            <td>Bahasa Arab</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>6</td>
                            <td>Matematika</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>7</td>
                            <td>IPA</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>8</td>
                            <td>IPS</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item">
                            <td>9</td>
                            <td>Bahasa Inggris</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok B
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Seni Budaya</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>
                        <tr class="item" id="pagebreak">
                            <td>2</td>
                            <td>PENJASKES</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr class="item" id="pagebreak">
                            <td>3</td>
                            <td>Prakarya</td>
                            <td>90</td>
                            <td>B</td>
                            <td>
                                Sangat baik dalam memahami akidah Islam, sifat-sifat wajib Allah SWT, sifat ikhlas,
                                taat, khauf, dan tobat, adab salat dan zikir, dan menganalisis kisah keteladanan Nabi
                                Sulaeman AS dan umatnya
                            </td>
                        </tr>
                        <tr>
                            <td class="kelompok" colspan="5">
                                Kelompok C
                            </td>
                        </tr>
                        <tr class="item">
                            <td>1</td>
                            <td>Bahasa Jawa</td>
                            <td>92</td>
                            <td>B</td>
                            <td>Baik dalam memahami kedudukan Al-Quran dan Al-Hadist sebagai pedoman hidup umat manusia,
                                isi kandungannya tentang tauhid, iman, dan ibadah yang diterima Allah SWT
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:20px;"></td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Jumlah Nilai (KI-3)</td>
                            <td colspan="2">1407</td>
                        </tr>
                        <tr class="jumlah">
                            <td colspan="3">Rata-rata</td>
                            <td colspan="2">93,8</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>D. Ketidakhadiran</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;"></td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>No</td>
                            <td colspan="2">Tidak Hadir Karena</td>
                            <td colspan="2">Keterangan</td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>1</td>
                            <td colspan="2">Sakit</td>
                            <td colspan="2">1 Hari</td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>2</td>
                            <td colspan="2">ijin</td>
                            <td colspan="2">- Hari</td>
                        </tr>
                        <tr class="ketidakhadiran">
                            <td>3</td>
                            <td colspan="2">Tanpa Keterangan </td>
                            <td colspan="2">1 Hari</td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;;"></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="padding-top: 10px;padding-left: 20px;">
                                <strong>E. Catatan Wali Kelas</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 5px;"></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="border: 1px solid black; padding: 5px 10px; text-align: left;">
                                Belajar Yang Rajin</td>
                        </tr>
                        <tr class="ttd">
                            <td colspan="4">Mengetahui, <br>
                                Orang Tua/ Wali Siswa
                            </td>
                            <td colspan="2">Wali Kelas</td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
</body>

</html>
