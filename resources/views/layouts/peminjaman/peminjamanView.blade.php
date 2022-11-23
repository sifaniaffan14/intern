@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <div class="peminjamanTop">
                <div>
                    <h1 class="h3 mb-2 text-gray-800">Pengajuan Pinjaman Barang</h1>
                </div>
                <div class="col-3 btn-tambah topButton">
                    <a href="{{ route('peminjamanForm') }}" class="btn btn-primary">+ Tambah Baru</a>
                    <a href="{{ route('peminjamAcc')}}" class="btn btn-danger">Cetak PDF</a>
                </div>
            </div>

            <div class="listPeminjaman">
                @foreach ($getData as $item)
                <div class="box1 card mb-4 py-3 border-left-primary">
                    <div class="itemPeminjaman">
                        <div class="data">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">jenis Kendaraan</th>
                                    <td>{{ $item->barang->jenisKendaraan }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Merk Kendaraan</th>
                                    <td>{{ $item->barang->merkKendaraan }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Jumlah</th>
                                    <td>{{ $item['banyaknya'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Driver</th>
                                    <td>{{ $item->driver->namaDriver}}</td>
                                </tr>

                            </table>
                        </div>

                        <div class="status">
                        
                            <span id="tayo">Status<br></span>
                            <span class="badge badge-primary">{{ $item['status_verif'] == "0" ? 'pending' : ''}}</span>
                            <span class="badge badge-success">{{ $item['status_verif'] == "3" ? 'Verifikasi Manager' : ''}}</span>
                            <span class="badge badge-warning">{{ $item['status_verif'] == "2" ? 'Verifikasi Supervisor' : ''}}</span>
                            <span class="badge badge-danger">{{ $item['status_verif'] == "1" ? 'Declined' : ''}}</span>
                            <div class="btn-tambah "><a href="{{ route('detailData', $item->id) }}"
                                    class="btn btn-primary btn-user btn-block">Details</a></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection
