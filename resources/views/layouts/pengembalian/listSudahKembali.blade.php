@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Page Heading -->
            <div class="pengajuanTop">
                <h1 class="h3 mb-2 text-gray-800">Pengembalian Barang</h1>
                <div class="bar">
                    <a href="{{ route('belumKembali')}}" class="btn btn-light btn-user">Belum Dikembalikan</a>
                    <a href="" class="btn btn-dark btn-user">Sudah Dikembalikan</a>
                </div>
            </div>
            <div class="listPeminjaman">
                @foreach ($getData as $item)
                <div class="box1 card mb-4 py-3 border-left-primary">
                    <div class="itemPeminjaman">
                        <div class="data">
                            <table style="width:100%">
                                <tr>
                                    <th style="width:30%">Nama Peminjam</th>
                                    <td> {{ $item['peminjam'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Nama Barang</th>
                                    <td>{{ $item->barang->namaBarang }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Merk Barang</th>
                                    <td>{{ $item->barang->merkBarang }}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Jumlah Barang</th>
                                    <td>{{ $item['banyaknya'] }}</td>
                                </tr>

                            </table>
                        </div>

                        <div class="status">
                            <p>Status <br>{{ $item['status']}}</p>
                            {{-- <select name="izinMembawa" id="izinMembawa" style="width:100%">
                                <option value="pending" {{ $item['status'] == "pending" ? 'selected' : '' }}>Pending</option>
                                <option value="accepted" {{ $item['status'] == "accepted" ? 'selected' : '' }}>Accepted</option>
                                <option value="declined" {{ $item['status'] == "declined" ? 'selected' : '' }}>Declined</option>
                            </select> --}}
                            <div class="btn-tambah "><a href="{{ route('detailPengembalian2', $item->id) }}"
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