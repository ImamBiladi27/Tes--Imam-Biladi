@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Order Data</div>
                <div class="panel-body">
                    
                    <!-- <div class="col-auto">
                        <a href="" class="btn btn-primary">Tambah Pesan</a>
                        <a href="" class="btn btn-info">Export Excel</a>
                    </div> -->



                    <br>

                    <h2>Halaman Mobil</h2>
                    
                    <div class="table-responsive">
                        <table class="table">
                            
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                               
                                <th>Total</th>
                                  
                                <th>Nama</th>
                                <th>Status</th>
                                

                            </tr>    
                            @foreach($rentals as $rental)
                            <tr>
                            <tr>
                      
                      
                        <td>{{ $rental->tgl_mulai }}</td>
                        <td>{{ $rental->tgl_akhir }}</td>
                        <td>{{ $rental->total }}</td>
                        <td>{{ $rental->user->name }}</td>
                        <td>{{ $rental->status }}</td>
                    </tr>
                             
                            </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                               
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection