
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/logobatang.ico">

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    
    <body>

    <!-- <body data-layout="horizontal"> -->

    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                        <div class="card">
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5>Selamat datang !</h5>
                                    <p class="text-muted">Login ke puskesos.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/auth" method="POST">
                                        @csrf
                                        @if (session()->has('loginError'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            {{ session('loginError') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="position-relative input-custom-icon">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email" value="{{ old('email') }}">
                                                 <span class="bx bx-user"></span>
                                            </div>
                                            @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup input-custom-icon">
                                                <span class="bx bx-lock-alt"></span>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                                            </div>
                                            @error('password')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <p class="mb-0">Belum memiliki akun ? <a href="/register" class="fw-medium text-primary"> Daftar Sekarang </a> </p>
                                            <p class="mt-3"> <a href="/">Kembali ke beranda</a> </p>
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
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/eva-icons/eva.min.js"></script>

        <script src="/assets/js/pages/pass-addon.init.js"></script>

    </body>

</html>