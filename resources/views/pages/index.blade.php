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

    <!-- plugin css -->
    <link href="/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Left Sidebar End -->
        <header class="ishorizontal-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="/assets/images/logobatang.png" alt="" height="36">
                            </span>
                            <span class="logo-lg">
                                <img src="/assets/images/logo_batang.png" alt="" height="48">
                            </span>
                        </a>

                        <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="/assets/images/logo_batang.png" alt="" height="26">
                            </span>
                            <span class="logo-lg">
                                <img src="/assets/images/logo_batang.png" alt="" height="30">
                            </span>
                        </a>
                    </div>

                    {{-- <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="bx bx-menu align-middle"></i>
                        </button> --}}

                    <!-- start page title -->
                    <div class="page-title-box align-self-center d-none d-md-block">
                        <h4 class="page-title mb-0">PUSKESOS</h4>
                    </div>
                    <!-- end page title -->

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <a href="/login" class="btn btn-md btn-success">Login</a>
                        <a href="/register" class="btn btn-md btn-primary">Register</a>
                    </div>
                </div>
            </div>

            <div class="topnav">
                <div class="container-fluid">
                    <h1 class="text-center mt-2">PUSKESOS SEDULUR DINAS SOSIAL</h1>
                    <h5 class="text-center mb-3">Selamat datang di Aplikasi Pelayanan Online Puskesos di Dinas Sosial
                        Kabupaten Batang</h5>
                </div>
            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4 col-xl-4">
                                    <a href="/jenis-pelayanan">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">JENIS LAYANAN</h5>
                                                <img src="/assets/images/icon/layanan.png" width="200px">
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end col -->

                                <div class="col-sm-6 col-lg-4 col-xl-4">
                                    <a href="/jam-pelayanan">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">JAM PELAYANAN</h5>
                                                <img src="/assets/images/icon/jam.png" width="230px">
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end col -->

                                <div class="col-sm-6 col-lg-4 col-xl-4">
                                    <a href="/utama">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">WEBSITE PUSKESOS</h5>
                                                <img src="/assets/images/icon/website.png" width="210px">
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end col -->
                            </div>

                            <div class="row d-flex justify-content-center">                     
                                <div class="col-sm-6 col-lg-4 col-xl-4">
                                    <a href="/teknis-pengajuan">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Teknis Pengajuan</h5>
                                                <img src="/assets/images/icon/teknis.png" width="200px">
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end col -->

                                <div class="col-sm-6 col-lg-4 col-xl-4">
                                    <a href="/cek-pengajuan">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Cek Pengajuan</h5>
                                                <img src="/assets/images/icon/search.png" width="230px">
                                            </div>
                                        </div>
                                    </a>
                                </div><!-- end col -->
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Puskesos.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> for <a
                                    href="https://Themesdesign.com/" target="_blank" class="text-reset">Dinsos
                                    Batang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/eva-icons/eva.min.js"></script>

    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <script src="/assets/js/pages/dashboard.init.js"></script>

    <script src="/assets/js/app.js"></script>

</body>

</html>
