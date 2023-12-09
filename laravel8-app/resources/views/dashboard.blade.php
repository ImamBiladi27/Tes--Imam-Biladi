@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Mobil</div>
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
                                <th>Nama Merk</th>
                                <th>Model Mobil</th>
                                <th>No Plat</th>
                                <th>Sewa</th>
                                <th>Stock</th>
                                <th>Action</th>
                                

                            </tr>    
                            @if(count($carsWithoutRentals) > 0 && isset($startDate) && isset($endDate))
                            @foreach($carsWithoutRentals as $mobil)
                            <tr>
                                <td>{{ $mobil->merk }}</td>
                                <td>{{ $mobil->model }}</td>
                                <td>{{ $mobil->no_plat }}</td>
                                <td>{{ $mobil->sewa }}</td>
                                <td>Ready</td>
                                <td>  
                                <a href="{{ route('checkout.form', ['carId' => $mobil->id]) }}" class="btn btn-primary">Tambah Pesan</a>
                                    </td>
                            </tr>
                            @endforeach
                            @endif
                            @if($finishedCars->isNotEmpty())
                            @foreach($carsWithoutRentals as $mobil)
                            <tr>
                                <td>{{ $mobil->merk }}</td>
                                <td>{{ $mobil->model }}</td>
                                <td>{{ $mobil->no_plat }}</td>
                                <td>{{ $mobil->sewa }}</td>
                                <td>Ready</td>
                                <td>  
                                <a href="{{ route('checkout.form', ['carId' => $mobil->id]) }}" class="btn btn-primary">Tambah Pesan</a>
                                    </td>
                            </tr>
                            @endforeach
                            @endif
                            @if($rentalsData->isNotEmpty())
                            @foreach($finishedCars as $mobil)
                            <tr>
                                <td>{{ $mobil->merk }}</td>
                                <td>{{ $mobil->model }}</td>
                                <td>{{ $mobil->no_plat }}</td>
                                <td>{{ $mobil->sewa }}</td>
                                <td>Ready</td>
                                <td>  
                                <a href="{{ route('checkout.form', ['carId' => $mobil->id]) }}" class="btn btn-primary">Tambah Pesan</a>
                                    </td>
                            </tr>
                            @endforeach
                            @endif
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