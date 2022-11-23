@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 style="float:left" class="m-0 font-weight-bold text-dark">Laporan Pemesanan Kendaraan</h3>
            <a href="{{ route('laporan.excel') }}" style="float:right" class="btn font-weight-bold btn-success" id="exportExcel">Export Excel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
                <table class="table" id="myTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Jenis Kendaraan</th>
                            <th>Merk Kendaraan</th>
                            <th>Kode Kendaraan</th>
                            <th>Banyaknya</th>
                            <th>Kondisi</th>
                            <th>Driver</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $pemesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$pemesanan->barang->jenisKendaraan}}</td>
                            <td>{{$pemesanan->barang->merkKendaraan}}</td>
                            <td>{{$pemesanan->barang->kodeKendaraan}}</td>
                            <td>{{$pemesanan->banyaknya}}</td>
                            <td>{{$pemesanan->barang->kondisi}}</td>
                            <td>{{$pemesanan->driver->namaDriver}}</td>
                            <td>{{$pemesanan->mulai}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection