@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 style="float:left" class="m-0 font-weight-bold text-dark">Data Kendaraan</h3>
            <a href="{{ route('barang.form') }}"style="float:right" class="btn font-weight-bold btn-primary">+ Create New</a>
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
                            <th>Kode Kendaraan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Merk Kendaraan</th>
                            <th>Jumlah</th>
                            <th>kondisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listBarang as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang['kodeKendaraan'] }}</td>
                            <td>{{ $barang['jenisKendaraan'] }}</td>
                            <td>{{ $barang['merkKendaraan'] }}</td>
                            <td>{{ $barang['jumlah'] }}</td>
                            <td>{{ $barang['kondisi'] }}</td>
                            <td>
                                <!-- <a href="#" style="margin: auto 0;" class="btn btn-success">Detail</a> -->
                                <a href="{{ route('barang.edit',$barang->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('barang.delete',$barang->id) }}" methode="post" class="btn btn-danger">Delete</a>
                            </td>
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
