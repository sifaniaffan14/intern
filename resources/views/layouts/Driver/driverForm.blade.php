@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Driver Baru</h6>
        </div>
        <div class="card-body">
            <form action="JavaScript:saveDriver()" id="addDriver" name="addDriver" class="form-horizontal" method="POST" autocomplete="off">
                @csrf
                <table class="tableFormUser">
                    <tr>
                        <td><input type="hidden" name="id" id="id" value="<?= isset($list['id']) ? ($list['id']) : '' ?>"></td>
                    </tr>
                    <tr>
                        <td style="width:30%">Nama Driver</td>
                        <td><input type="text" name="namaDriver" id="namaDriver" value="<?= isset($list['namaDriver']) ? ($list['namaDriver']) : '' ?>"></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td><input type="text" name="Rating" id="Rating" value="<?= isset($list['Rating']) ? ($list['Rating']) : '' ?>"></td>
                    </tr>
                </table>
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" style="padding:0.5vw 2vw">Submit</button>
                </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script type="text/javascript">
    var url = window.location.href;
    var array = url.split('/');
    var lastsegment = array[array.length - 1];
    console.log(lastsegment);

    input(lastsegment);

    function input(id) {

        $.ajax({
            type: "GET",
            url: "{{url('inputfield')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id_driver: id,

            },
            success: function(res) {
                console.log(res);
                $("#id").val(res.driver.id);
                $("#namaDriver").val(res.driver.namaDriver);
                $("#Rating").val(res.driver.Rating);
            }
        })
    }

    function saveDriver() {
        var id = $("#id").val();
        var namaDriver = $("#namaDriver").val();
        var Rating = $("#Rating").val();

        if ($("#id").val() == '') {

            // ajax

            $.ajax({
                type: "POST",
                url: "{{ url('driverAdd') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    namaDriver: namaDriver,
                    Rating: Rating,
                },
                dataType: 'json',
                success: function(res) {

                    if (res.success == true) {
                        Swal.fire({
                            title: 'success',
                            text: 'Data Telah Ditambahkan',
                            icon: 'success',
                            confirmButtonText: 'oke'
                        });
                        window.location.href = window.location.origin + '/drivermanagement';
                    } else {
                        window.location.href = window.location.origin + '/driverForm';
                    }
                }
            });
        } else {

            $.ajax({
                type: "POST",
                url: window.location.origin + "/editDriver",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    namaDriver: namaDriver,
                    Rating: Rating,
                },
                dataType: 'json',
                success: function(res) {

                    if (res.success == true) {
                        Swal.fire({
                            title: 'success',
                            text: 'Data Telah Ditambahkan',
                            icon: 'success',
                            confirmButtonText: 'oke'
                        });
                        window.location.href = window.location.origin + '/drivermanagement';
                    } else {
                        Swal.fire({
                            title: 'error',
                            text: 'gagal',
                            icon: 'error',
                            confirmButtonText: 'oke'
                        });
                    }
                }
            });
        }
    }

    
</script>