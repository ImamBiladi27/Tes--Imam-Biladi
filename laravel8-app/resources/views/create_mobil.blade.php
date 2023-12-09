@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Add Mobil</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('storemobil') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label class="control-label">Merk</label>
                            <input type="text" name="merk" id="merk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Model</label>
                            <input type="text" name="model" id="model" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Plat</label>
                            <input type="text" name="no_plat" id="no_plat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tarif Per Hari</label>
                            <input type="number" name="sewa" id="sewa" class="form-control">
                        </div>

                       
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection