@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->

            <a href="{{route('downloadPDF')}}">download</a>
            <a href="{{route('showpdf')}}">download2</a>
            <div class="boxPdf">
                <div class="topPDF">
                    <div class="kiri"></div>
                    <div class="tengah">
                        <h2>Formulir Permohonan Izin Bawa Inventaris</h2>
                        <div class="linePDF"></div>
                        <p>Jalan Tirto Utomo GG.8 No 3, Landungsari, Dau, Malang</p>
                    </div>
                    <div class="kanan">
                        <p>Kode Dokumen : </p>
                        <div class="linePDF"></div>
                        <p>Status Revisi : </p>
                        <div class="linePDF"></div>
                        <p>Tanggal Berlaku : </p>
                        <div class="linePDF"></div>
                        <p>Halaman ke : </p>
                    </div>
                </div>
                <div class="isiPDF">
                    <div class="isiPDF-atas">
                        <div class="kiri">
                            <p>Saya Yang Bertanda Tangan Dibawah ini:</p>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <td>Divisi</td>
                                    <td>: ...</td>
                                </tr>
                            </table>
                        </div>
                        <div class="kanan"></div>
                    </div>

                    <div>
                        <p>Mengajukan permohonan Izin Membawa <span>.....</span> Inventaris perusahaan Sesuai pada tabel
                            di bawah, karena dipergunakan untuk:</p>
                        <p>...............................</p>
                    </div>

                    <div class="mainTable">
                        <table border="1" width="100%">
                            <tr>
                                <th>NO</th>
                                <th>Jenis Barang</th>
                                <th>Merk Barang</th>
                                <th>Kode Barang</th>
                                <th>Banyaknya</th>
                                <th>Kondisi</th>
                            </tr>
                            @foreach ($getData as $item)
                            @if($item->peminjaman->peminjam == Auth::user()->name)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->peminjaman->barang->namaBarang}}</td>
                                <td>{{$item->peminjaman->barang->merkBarang}}</td>
                                <td>{{$item->peminjaman->barang->kodeBarang}}</td>
                                <td>{{$item->peminjaman->banyaknya}}</td>
                                <td>{{$item->peminjaman->barang->kondisi}}</td>
                            </tr>
                            @endif
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        @endsection
