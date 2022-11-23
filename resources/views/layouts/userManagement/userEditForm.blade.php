@extends('master.App')

@section('content')

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif
            <form action="{{ route('user.put',$user->id) }}" method="post">
                @csrf
                <table class="tableFormUser">
                    <tr>
                        <td style="width:30%">Username</td>
                        <td><input type="text" name="username" value="{{ $user->username}}"></td>  
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" value="{{ $user->name}}"></td>  
                    </tr>
                    <tr>
                        <td>Departemen</td>
                        <td><input type="text" name="departemen" value="{{ $user->departemen}}"></td>  
                    </tr>
                    <tr>
                        <td>Divisi</td>
                        <td><input type="text" name="divisi" value="{{ $user->divisi}}"></td>  
                    </tr>
                    <tr>
                        <td>Role User</td>
                            <td>
                                <select name="role" id="role" style="width:100%">
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="admin" {{ $user['role'] == "admin" ? 'selected' : ''}}>Admin</option>
                                    <option value="direktur" {{ $user['role'] == "direktur" ? 'selected' : ''}}>Direktur</option>
                                    <option value="pemohon" {{ $user['role'] == "pemohon" ? 'selected' : ''}}>Pemohon</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value="{{ $user->password}}"></td>  
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
