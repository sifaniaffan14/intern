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
                    <h1 class="h3 mb-2 text-gray-800">List Barang Siap Dicetak</h1>
                </div>
            </div>

            @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif

            <form action="{{ route('choosePrint') }}" method="post">
                @csrf
                <div class="listPeminjaman">
                    @foreach ($getData as $item)
                    <div class="box1 card mb-4 py-3 border-left-primary">


                        <div class="itemPeminjaman">
                            <div class="data">
                                <div class="check"><input type="checkbox" name="peminjaman_id[]" id="peminjaman_id"
                                        value="{{ $item['id'] }}"></div>
                                <table style="width:100%; margin:0">
                                <tr>
                                    <th style="width:30%">jenis Kendaraan</th>
                                    <td>{{ $item->barang->jenisKendaraan }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Merk Kendaraan</th>
                                    <td>{{ $item->barang->merkKendaraan }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Jumlah Barang</th>
                                    <td>{{ $item['banyaknya'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Driver</th>
                                    <td>{{ $item->driver->namaDriver}}</td>
                                </tr>

                                </table>
                            </div>

                            <div class="status">
                                <p id="tayo">Status <br>{{ $item['status'] }}</p>
                                <div class="btn-tambah "><a href="{{ route('peminjamanForm') }}"
                                        class="btn btn-primary btn-user btn-block">Details</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="cetak">
                    <div class="col-3 btn-tambah "><input class="btn btn-danger btn-user btn-block" type="submit" value="Cetak"></div>
                </div>
                
            </form>

        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection
