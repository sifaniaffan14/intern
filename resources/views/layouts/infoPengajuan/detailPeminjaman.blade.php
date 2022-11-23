@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('status') }}</strong>
            </div>
            @endif
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pengajuan Pemesanan Kendaraan</h1>
            <div class="formPengajuan">
                <form action="{{ route('updateData', $peminjaman->id)}}" method="post">
                    @csrf
                    <table style="width:50%">
                        <tr>
                            <th style="width:30%">Pemesan</th>
                            <th >
                                <input style="display:none" type="text" name="peminjam" value="{{ $peminjaman['peminjam']}}">
                                {{ $peminjaman['peminjam']}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Jenis Kendaraan</th>
                            <th >
                                <input style="display:none" type="text" name="barang_id" value=" {{ $peminjaman->barang->id}}">
                                {{ $peminjaman->barang->jenisKendaraan}}
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Merk</th>
                            <th>
                                {{ $peminjaman->barang->merkKendaraan}}
                                
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Jumlah</th>
                            <th>
                                <input style="display:none" type="text" name="banyaknya" value="{{ $peminjaman['banyaknya']}}"> {{ $peminjaman['banyaknya']}}
                                
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Driver Kendaraan</th>
                            <th >
                                <input style="display:none" type="text" name="barang_id" value=" {{ $peminjaman->barang->id}}">
                                {{ $peminjaman->driver->namaDriver}}
                            </th>
                        </tr>
                    </table>

                    

                    <div class="peminjamanDivider"></div>

                    <p> Waktu</p>
                    <table style="width:50%">
                        <tr>
                            <th style="width:30%">Mulai</th>
                            <th>
                                <input style="display:none" type="text" name="mulai" value="{{ $peminjaman['mulai']}}"> {{ $peminjaman['mulai']}}
                            </th>
                        </tr>



                        <tr>
                            <th style="width:30%">Status</th>
                            <th>
                                @if($peminjaman['status_verif'] == 0 || (auth()->user()->role == "manager" && $peminjaman['status_verif'] != 3))
                            <select name="status_verif" id="status_verif" style="width:100%">
                                <option value="0">Pending</option>
                                <option value="1">Declined</option>
                                @if (auth()->user()->role == "manager")
                                <option value="3">Accepted</option>
                                @else
                                <option value="2">Accepted</option>
                                @endif
                            </select>
                            @else
                            {{ $peminjaman['status_verif'] == "2" ? 'Verifikasi Supervisor' : ($peminjaman['status_verif'] == "1" ? 'Declined' : 'Verifikasi Manager')}}
                            @endif
                            </th>
                        </tr>

                    </table>
                    <div class="chooseButton">
                        <button class="buttonItem btn-1"> Cancel</button>
                        <input class="buttonItem btn-2" type="submit" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
