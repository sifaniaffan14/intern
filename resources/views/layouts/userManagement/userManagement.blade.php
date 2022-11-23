@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 style="float:left" class="m-0 font-weight-bold text-dark">Data User</h3>
            <a href="{{ route('user.form') }}"style="float:right" class="btn font-weight-bold btn-primary">+ Create New</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getData as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>{{ $item['role'] }}</td>
                            <td>
                                <!-- <a href="#" style="margin: auto 0;" class="btn btn-success">Detail</a> -->
                                <a href="{{ route('user.edit',$item->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('user.delete',$item->id) }}" methode="post" class="btn btn-danger">Delete</a>
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
