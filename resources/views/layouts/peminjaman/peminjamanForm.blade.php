@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Pemesanan Kendaraan</h1>
            <div class="formPengajuan">
                <form action="{{ route('createData') }}" method="post" >
                    @csrf
                    <table style="width:50%" id="tambah">
                        <!-- <tr>
                            <th style="width:30%">Jenis Kendaraan</th>
                            <th>
                                <select name="jenisBarang" id="jenisBarang" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach ($listBarang as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['jenisKendaraan'] }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Merk</th>
                            <th>
                                <select name="merk" id="merk" style="width:100%">
                                <option value="" disabled selected>Select your option</option>
                                @foreach ($listBarang as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['merkKendaraan'] }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>  -->

                        <tr>
                            <th style="width:30%">Driver</th>
                            <th>
                                <select name="driver_id" id="driver_id" style="width:100%">
                                <option value="" disabled selected>Select your option</option>
                                @foreach ($listdriver as $driver)
                                        <option value="{{ $driver['id'] }}">{{ $driver['namaDriver'] }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr> 
                        <tr>
                            <th style="width:30%">Pilih Kendaraan</th>
                            <th>
                                <select name="barang_id" id="barang_id" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach ($listBarang as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['jenisKendaraan'] }} {{ $item['merkKendaraan'] }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Pilih Divisi Supervisor</th>
                            <th>
                                <select name="user_id" id="user_id" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    @foreach ($listsupervisor as $user)
                                        <option value="{{ $user['id'] }}">{{ $user['divisi'] }}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>

                        <tr>
                            <th style="width:30%">Banyaknya</th>
                            <th>
                                <select name="banyaknya" id="banyaknya" style="width:100%">
                                    <option value="0" disabled selected>Select Number Of Borrowing</option>
                                </select>
                            </th>
                        </tr>
                    </table>
                   
                    <div class="peminjamanDivider"></div>

                    <p>Jangka Waktu</p>
                    <table style="width:50%">
                        <tr>
                            <th style="width:30%">Waktu</th>
                            <th>
                                <input type="date" name="mulai" id="mulai" style="width:100%">
                            </th>
                        </tr>
                       
                    </table>
                    <div class="chooseButton">
                    <a href="/peminjaman"> <button type="button" class="buttonItem btn-1 "> Cancel</button></a>
                        <input class="buttonItem btn-2" type="submit" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
@endsection
