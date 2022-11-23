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
                    <h1 class="h3 mb-2 text-gray-800">Verifikasi Barang</h1>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
                <a href="{{route('showpdf')}}">download2</a>
            <table border="1" style="margin:2vw 0; text-align: center" width="100%">
                <tr>
                    <th>NO</th>
                    <th>Jenis Kendaraan</th>
                    <th>Merk Kendaraan</th>
                    <th>Kode Kendaraan</th>
                    <th>Banyaknya</th>
                    <th>Kondisi</th>
                    <th>Driver</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                @foreach ($getData as $item)
                @if($item->peminjaman->peminjam == Auth::user()->name)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$item->peminjaman->barang->jenisKendaraan}}</td>
                    <td>{{$item->peminjaman->barang->merkKendaraan}}</td>
                    <td>{{$item->peminjaman->barang->kodeKendaraan}}</td>
                    <td>{{$item->peminjaman->banyaknya}}</td>
                    <td>{{$item->peminjaman->barang->kondisi}}</td>
                    <td>{{$item->peminjaman->driver->namaDriver}}</td>
                    <td>{{$item->peminjaman->mulai}}</td>
                    <td style="padding:0.5vw"><a href="{{ route('deleteDataPrint',$item->id) }}" methode="post" class="btn btn-danger btn-user btn-block">Delete</a></td>
                </tr>
                @endif
                @endforeach
            </table>

            <a href="{{route('downloadPDF')}}" class="btn btn-primary btn-user btn-block">Cetak PDF</a>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection
