<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <link rel="stylesheet" href="{{ asset('/css2/style.css') }}">
    
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register Page</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                    <div class="img" style="background-image: url(images2/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign Up</h3>
                    </div>
                </div>
             
                <form action="{{ route('storeuser') }}" method="post"class="signin-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" required>
                        <label for="name" class="form-control-placeholder">Name</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                        <label for="alamat" class="form-control-placeholder">Alamat</label>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="nomor_telepon" id="nomor_telepon" required>
                        <label for="nomor_telepon" class="form-control-placeholder">Nomor Telepon</label>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="nomor_sim" id="nomor_sim" required>
                        <label for="nomor_sim" class="form-control-placeholder">Nomor SIM</label>
                    </div>
           
                    <div class="form-group">
                        <button class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
                    </div>
            
            <div class="form-group d-md-flex">
                <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-primary mb-0">
                        Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>

                    <div class="w-50 text-md-right">
                        <a href="">
                            Forgot Password
                        </a>
                    </div>
            </div>
                </form>
                <p class="text-center">Not a member ? <a data-toogle="tab" href="#signup">Sign Up</a></p>

            </div>
        </div>
    </section>

    <script src="{{ asset('js2/jquery.min.js') }}"></script>
  <script src="{{ asset('js2/popper.js') }}"></script>
  <script src="{{ asset('js2/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js2/main.js') }}"></script>

</body>
</html>