<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    Home
                </a>
                <a class="navbar-brand" href="{{ route('createmobil') }}">
                    Tambah Mobil
                </a>
                <a class="navbar-brand" href="#">
                    Tambah Data
                </a>
        
                <a class="navbar-brand" href="#">
                    Approval
                </a>
        
            </div>

        </div>
    </nav>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Checkout</div>
               
  
   
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('checkout', ['carId' => $car->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">Nama Penyewa</label>
                            <select class="form-control"  name="user_id" required>
            @foreach($users as $user)
                <option class="form-control" value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label">Id Mobil</label>
                            <input type="text" name="merk" id="id" class="form-control" value="{{ $car->id }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Merk</label>
                            <input type="text" name="merk" id="merk" class="form-control" value="{{ $car->merk }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Model</label>
                            <input type="text" name="model" id="model" class="form-control" value="{{ $car->model }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="tgl_mulai">Tanggal Mulai:</label>
                            <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
                        </div>
                            <div class="form-group">
                                <label for="tgl_akhir">Tanggal Selesai:</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                            </div>

                            <div class="form-group">
                            <label class="control-label">No Plat</label>
                            <input type="text" name="no_plat" id="no_plat" class="form-control" value="{{ $car->no_plat }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sewa</label>
                            <input type="text" name="sewa" id="sewa" class="form-control" value="{{ $car->sewa }}">
                            <input type="hidden" name="status" value="Belum Selesai">
                        </div>
                            <div class="form-group">
                            

                            <label for="total">Total:</label>
        <input type="text" name="total" id="total" class="form-control" readonly>

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

<script>
        document.addEventListener('DOMContentLoaded', function () {
            var startDateInput = document.getElementById('tgl_mulai');
            var endDateInput = document.getElementById('tgl_akhir');
            var totalInput = document.getElementById('total');

            startDateInput.addEventListener('change', updateTotal);
            endDateInput.addEventListener('change', updateTotal);

            function updateTotal() {
                var startDate = new Date(startDateInput.value);
                var endDate = new Date(endDateInput.value);

                // Hitung selisih hari
                var timeDifference = endDate.getTime() - startDate.getTime();
                var daysDifference = timeDifference / (1000 * 3600 * 24);

                // Hitung total
                var rentalRate =  {{ $car->sewa }};
                var total = daysDifference * rentalRate;

                // Tampilkan total
                totalInput.value = total.toFixed(2);
            }
        });
    </script>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>

</html>