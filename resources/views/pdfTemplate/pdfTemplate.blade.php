<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .boxPdf {
            border: 3px solid black
        }

        table {
            border-collapse: collapse;
        }

        .table1 {
            width: 100%;
        }

        .table1 td {
            text-align: center;
            vertical-align: middle;
        }

        h1 {
            margin: 0;
            font-weight: normal;
        }

        .bagian1 {
            margin: 1.5vw 0;
            padding: 1.5vw 1vw;
        }

        .tab {
            margin: 0 1vw;
        }

        .bagian1 .bagian1-kanan {
            border: 1px solid black
        }
        .tdd {
            margin-top: 2vw
        }

        .imgLogo{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="boxPdf">
        <div class="bagian0">
            <table class="table1" border="1" width="100%">
                <tr>
                    <td width="20%" rowspan="4">
                        <img src="{{asset('images/sekawan.jpg')}}" alt="Ini Image" class="imgLogo">
                    </td>
                    <td width="60%" rowspan="3">
                        <h1>Formulir Pengajuan Pemesanan Kendaraan</h1>
                    </td>
                    <td width="20%">Kode Dokumen :</td>
                </tr>
                <tr>
                    <td>Status Revisi :</td>
                </tr>
                <tr>
                    <td>Tanggal Berlaku :</td>
                </tr>
                <tr>
                    <td>Jalan Tirto Utomo GG.8 No 3, Landungsari, Dau, Malang</td>
                    <td>Halaman ke :</td>
                </tr>
            </table>
        </div>


        <div class="bagian1">
            <table class="table2" width="100%">
                <tr>
                    <td width="70%">
                        <p>Saya Yang Bertanda Tangan Dibawah ini:</p>
                        <div class="tab">
                            <table width="50%">
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <td>Departemen / Divisi</td>
                                    <td>: {{Auth::user()->departemen}} / {{Auth::user()->divisi}}</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td width="30%" style="text-align: center ; font-style: italic; padding:1vw">
                        <div class="bagian1-kanan">
                            Maksimal Peminjaman adalah 7 hari lamanya. Apabila dibutuhkan, maka pada periode berikutnya
                            yang bersangkutan wajib mengajukan izin lagi & akan diukur tingkat kepentingannya.
                        </div>
                    </td>
                </tr>
            </table>

            <div>
                <p>Mengajukan permohonan Izin Membawa 
                    <span style="font-weight: bold">
                        @foreach ($list as $item)
                        {{$item->peminjaman->izinMembawa}}
                        @break;
                        @endforeach    
                    </span> Inventaris perusahaan Sesuai pada tabel
                    di bawah, karena dipergunakan untuk:</p>
                <p>@foreach ($list as $item)
                    {{$item->peminjaman->alasanPeminjaman}}
                    @break;
                    @endforeach</p>
            </div>

            <div class="mainTable">
                <table border="1" width="100%" style="text-align: center">
                    <tr>
                        <th>NO</th>
                        <th>Jenis Kendaraan</th>
                        <th>Merk Kendaraan</th>
                        <th>Kode Kendaraan</th>
                        <th>Banyaknya</th>
                        <th>Kondisi</th>
                        <th>Driver</th>
                    </tr>
                    @foreach ($list as $item)
                    @if($item->peminjaman->peminjam == Auth::user()->name)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$item->peminjaman->barang->namaBarang}}</td>
                        <td>{{$item->peminjaman->barang->merkBarang}}</td>
                        <td>{{$item->peminjaman->barang->kodeBarang}}</td>
                        <td>{{$item->peminjaman->banyaknya}}</td>
                        <td>{{$item->peminjaman->barang->kondisi}}</td>
                        <td>{{$item->peminjaman->driver->namaDriver}}</td>
                    </tr>
                    @endif
                    @endforeach

                </table>
            </div>

            <div class="tdd">
                    <table class="table1" width="100%">
                        <tr>
                            <td width="20%"> Pemohon,</td>
                            <td width="60%" rowspan="4"></td>
                            <td width="20%">Pemberi Izin</td>
                        </tr>
                        <tr>
                            <td style="height:50px"></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>{{Auth::user()->name}}</td>
                            <td>Direktur</td>
                        </tr>
                    </table>
                </div>
        </div>


    </div>
</body>

</html>
