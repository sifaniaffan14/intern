@extends('master.App')

@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User Baru</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session('status') }}</strong>
            </div>
            @endif
            <form action="{{ route('user.add') }}" method="post">
                @csrf
                @error('username')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                <table class="tableFormUser">
                    <tr>
                        <td style="width:30%">Username</td>
                        <td><input type="text" name="username"></td>  
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name"></td>  
                    </tr>
                    <tr>
                        <td>Departemen</td>
                        <td><input type="text" name="departemen"></td>  
                    </tr>
                    <tr>
                        <td>Divisi</td>
                        <td><input type="text" name="divisi"></td>  
                    </tr>
                    <tr>
                        <td>Role User</td>
                            <td>
                                <select name="role" id="role" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="admin">Admin</option>
                                    <option value="direktur">Direktur</option>
                                    <option value="pemohon">Pemohon</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>  
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
