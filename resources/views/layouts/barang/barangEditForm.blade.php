@extends('master.App')

@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kendaraan</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
            <form action="{{ route('barang.put',$barang->id) }}" method="POST">
                @csrf
                <table class="tableFormUser">
                    <tr>
                        <td style="width:30%">Kode Kendaraan</td>
                        <td><input type="text" name="kodeBarang" value="{{ $barang->kodeBarang}}"></td>  
                    </tr>
                    <tr>
                        <td>Jenis Kendaraan</td>
                        <td><input type="text" name="namaBarang" value="{{ $barang->namaBarang}}"></td>  
                    </tr>
                    <tr>
                        <td>Merk Kendaraan</td>
                        <td><input type="text" name="merkBarang" value="{{ $barang->merkBarang}}"></td>  
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td><input type="number" name="jumlah" value="{{ $barang->jumlah}}"></td>  
                    </tr>
                    <tr>
                        
                    <tr>
                        <td>Kondisi</td>
                        <td><input type="text" name="kondisi" value="{{ $barang->kondisi}}"></td>  
                    </tr>
                   
                </table>
                <div class="chooseButton">
                    <button type="submit" class="btn btn-primary" style="padding:0.5vw 2vw">Submit</button>
                </div>
               
            </form>
        </div>
    </div>



</div>

@endsection
