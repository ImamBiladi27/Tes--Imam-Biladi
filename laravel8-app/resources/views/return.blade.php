@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Return</div>
                <div class="panel-body">
                    <form action="{{ route('return_car') }}" method="post">
                          @csrf

                     
                        <div class="form-group">
                            <label class="control-label">No Plat</label>
                            <input type="text" name="no_plat" id="no_plat" class="form-control">
                        </div>
                        <input type="hidden" name="days_used" value="{{ $daysUsed }}">

<p>Jumlah Hari Dipakai: {{ $daysUsed }} hari</p>

<!-- Hidden input untuk tarif harian -->



                       
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