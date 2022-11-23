@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <div class="pengajuanTop">
                <h1 class="h3 mb-2 text-gray-800">Pengajuan Pemesanan Kendaraan</h1>
                @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
                <div class="bar">
                    <a href="" class="btn btn-dark btn-user">Belum Direspon</a>
                    <a href="{{ route('listRiwayat')}}" class="btn btn-light btn-user">Riwayat</a>
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
                            <p>Status <br>{{ $item['status_verif'] == "2" ? 'Verifikasi Supervisor' : ($item['status_verif'] == "1" ? 'Declined' : 'Verifikasi Manager')}}</p>
                            
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
