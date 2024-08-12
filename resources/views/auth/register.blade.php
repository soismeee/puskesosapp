
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logobatang.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    
    <body>

    <!-- <body data-layout="horizontal"> -->

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-8 col-xl-8">

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5>Pendaftaran akun</h5>
                                    <p class="text-muted">Buat akun untuk aplikasi puskesos sekarang.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/registration" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Nama</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukan nama anda" value="{{ old('name') }}">  
                                                <span class="bx bx-mail-send"></span>
                                            </div>     
                                            @error('name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
        
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" value="{{ old('email') }}">
                                                 <span class="bx bx-user"></span>
                                            </div>
                                            @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="telepon">Telepon</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukan nomor telepon" value="{{ old('telepon') }}">
                                                 <span class="bx bx-phone"></span>
                                            </div>
                                            @error('telepon')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" id="password" name="password" minlength="5" placeholder="Masukan password">
                                            </div>
                                            @error('password')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Daftar</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Sudah memiliki akun ? <a href="/login" class="fw-medium text-primary"> Login sekarang</a></p>
                                            <p class="mt-3"><a href="/">Kembali ke beranda</a></p>    
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center p-4">
                            <p>© <script>document.write(new Date().getFullYear())</script> Puskesos. Crafted with <i class="mdi mdi-heart text-danger"></i> for Dinsos Batang</p>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- end container -->
    </div>
    <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/eva-icons/eva.min.js"></script>

    </body>

</html>