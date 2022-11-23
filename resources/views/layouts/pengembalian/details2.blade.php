@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Detail Pengembalian Barang</h1>
            <div class="formPengajuan">
                <form action="{{ route('updateBelumPengembalian', $peminjaman->id)}}" method="post">
                    @csrf
                    <table style="width:50%">
                        <tr>
                            <th style="width:30%">Peminjam</th>
                            <th >
                                <input style="display:none" type="text" name="peminjam" value="{{ $peminjaman['peminjam']}}">
                                {{ $peminjaman['peminjam']}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Jenis Barang</th>
                            <th >
                                <input style="display:none" type="text" name="barang_id" value=" {{ $peminjaman->barang->id}}">
                                {{ $peminjaman->barang->namaBarang}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Merk</th>
                            <th>
                                {{ $peminjaman->barang->merkBarang}}
                                
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Banyaknya</th>
                            <th>
                                <input style="display:none" type="text" name="banyaknya" value="{{ $peminjaman['banyaknya']}}"> {{ $peminjaman['banyaknya']}}
                                
                            </th>
                        </tr>
                    </table>

                    <div class="peminjamanDivider"></div>

                    <p>Jangka Waktu</p>
                    <table style="width:50%">
                        <tr>
                            <th style="width:30%">Mulai</th>
                            <th>
                                <input style="display:none" type="text" name="mulai" value="{{ $peminjaman['mulai']}}"> {{ $peminjaman['mulai']}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Sampai</th>
                            <th>
                                <input style="display:none" type="text" name="sampai" value="{{ $peminjaman['sampai']}}"> {{ $peminjaman['sampai']}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Izin Membawa</th>
                            <th>
                                <input style="display:none" type="text" name="izinMembawa" value="{{ $peminjaman['izinMembawa']}}"> {{ $peminjaman['izinMembawa']}}
                            </th>
                        </tr>

                        <input style="display:none" type="text" name="status" value="{{ $peminjaman['status']}}">

                    </table>
                    <div class="chooseButton2">
                        <div class="atas">
                            <input class="buttonItem btn-2" type="submit" value="Belum Kembali">
                        </div>
                        <div class="bawah">
                            <button class="buttonItem btn-1"> Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
