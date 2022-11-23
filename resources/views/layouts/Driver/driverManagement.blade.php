@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 style="float:left" class="m-0 font-weight-bold text-dark">Data Driver</h3>
            <a href="{{ route('driver.form') }}" style="float:right" class="btn font-weight-bold btn-primary" id="addNewBook">+ Create New</a>
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
                            <th>Nama Driver</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $driver)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $driver['namaDriver'] }}</td>
                            <td>{{ $driver['Rating'] }}</td>
                            <td>
                                <a href="{{ route('driver.formedit', $driver->id)}}" class="btn btn-warning">Edit</a>
                                <a href="JavaScript:hapusDriver({{$driver->id}})" class="btn btn-danger">Delete</a>
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
<script type="text/javascript">

function hapusDriver(id) {

$.ajax({
    type: "GET",
    url: "{{ url('deleteDriver') }}",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {
            id : id,
    },
    dataType: 'json',
    success: function(res) {
        window.location.href = window.location.origin + '/drivermanagement';
    }
})
}
</script>
