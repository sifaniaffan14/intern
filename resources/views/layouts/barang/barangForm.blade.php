@extends('master.App')

@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Baru</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('status') }}</strong>
            </div>
            @endif
            <form action="{{ route('barang.add') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <table class="tableFormUser">
                    <tr>
                        <td style="width:30%">Kode Kendaraan</td>
                        <td><input type="text" name="kodeKendaraan"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kendaraan</td>

                        <td><select name="jenisKendaraan" id="jenisKendaraan">
                                    <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                                    <option value="Motor">Motor</option>
                                    <option value="Mobil">Mobil</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Merk Kendaraan</td>
                        <td><input type="text" name="merkKendaraan"></td>
                    </tr>
                    <tr>
                        <td>jumlah</td>
                        <td><input type="number" name="jumlah"></td>
                    </tr>

                    <td>kondisi</td>
                    <td><input type="text" name="kondisi"></td>
                    </tr>
                    <!-- <tr>
                        <td>Role User</td>
                            <td>
                                <select name="role" id="role" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="admin">Admin</option>
                                    <option value="direktur">Direktur</option>
                                    <option value="pemohon">Pemohon</option>
                                </select>
                            </td>
                    </tr> -->
                    <!-- <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>  
                    </tr> -->
                </table>
                <div class="chooseButton">
                    <button type="submit" class="btn btn-primary" style="padding:0.5vw 2vw">Submit</button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection