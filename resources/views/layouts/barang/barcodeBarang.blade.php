@extends('master.App')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 style="float:left" class="m-0 font-weight-bold text-dark">Barcode</h3>
            <a href="{{ route('barcodePrint') }}" style="float:right" class="btn btn-primary">Print</a>
        </div>
        <div class="card-deck">
        <div class="card-body">
            <div id="print">
                <h1>ppppp</h1>
            </div>
            <!-- <div class="table-responsive">
                @if (session('status'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session('status') }}</strong>
                </div>
                @endif

            </div> -->
        </div>
        </div>
    </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection
