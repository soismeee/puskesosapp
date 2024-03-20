
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Puskesos" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/logobatang.ico">

        <!-- plugin css -->
        {{-- <link href="/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" /> --}}

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Sweet Alert-->
        <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        @stack('css')
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

                        <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="bx bx-menu align-middle"></i>
                        </button>

                        <!-- start page title -->
                        <div class="page-title-box align-self-center d-none d-md-block">
                            <h4 class="page-title mb-0">PUSKESOS</h4>
                        </div>
                        <!-- end page title -->

                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            @if (auth()->check())
                            <a href="/logout" class="btn btn-md btn-dark">Logout</a>
                            @else
                            <a href="/login" class="btn btn-md btn-success">Login</a>
                            <a href="/register" class="btn btn-md btn-primary">Register</a>
                            @endif

                        </div>
                    </div>
                </div>

                @include('layout.sidebar')
            </header>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('container')

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Puskesos.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> for <a href="https://Themesdesign.com/" target="_blank" class="text-reset">Dinsos Batang</a>
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
        {{-- <script src="/assets/libs/apexcharts/apexcharts.min.js"></script> --}}

        <!-- Vector map-->
        {{-- <script src="/assets/libs/jsvectormap/js/jsvectormap.min.js"></script> --}}
        {{-- <script src="/assets/libs/jsvectormap/maps/world-merc.js"></script> --}}
        
        {{-- <script src="/assets/js/pages/dashboard.init.js"></script> --}}

        <script src="/assets/js/app.js"></script>
        <!-- Sweet Alerts js -->
        <script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
        
        <!-- Sweet alert init js-->
        {{-- <script src="/assets/js/pages/sweet-alerts.init.js"></script> --}}
        
        <script>
            function sweetAlert(title, message, icon) {
                swal.fire({
                    title: title,
                    text: message,
                    icon: icon,
                    confirmButtonColor:"#038edc"
                });
            }

            // asset sweet alert di template ini
            // document.getElementById("sa-basic").addEventListener("click",function(){Swal.fire({title:"Any fool can use a computer",confirmButtonColor:"#038edc"})}),
            // document.getElementById("sa-title").addEventListener("click",function(){Swal.fire({title:"The Internet?",text:"That thing is still around?",icon:"question",confirmButtonColor:"#038edc"})}),
            // document.getElementById("sa-success").addEventListener("click",function(){Swal.fire({title:"Good job!",text:"You clicked the button!",icon:"success",showCancelButton:!0,confirmButtonColor:"#038edc",cancelButtonColor:"#f34e4e"})}),
            // document.getElementById("sa-warning").addEventListener("click",function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#51d28c",cancelButtonColor:"#f34e4e",confirmButtonText:"Yes, delete it!"}).then(function(e){e.value&&Swal.fire("Deleted!","Your file has been deleted.","success")})}),
            // document.getElementById("sa-params").addEventListener("click",function(){Swal.fire({title:"Are you sure?",text:"You won't be able to revert this!",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes, delete it!",cancelButtonText:"No, cancel!",confirmButtonClass:"btn btn-success mt-2",cancelButtonClass:"btn btn-danger ms-2 mt-2",buttonsStyling:!1}).then(function(e){e.value?Swal.fire({title:"Deleted!",text:"Your file has been deleted.",icon:"success",confirmButtonColor:"#038edc"}):e.dismiss===Swal.DismissReason.cancel&&Swal.fire({title:"Cancelled",text:"Your imaginary file is safe :)",icon:"error",confirmButtonColor:"#038edc"})})}),
            // document.getElementById("sa-image").addEventListener("click",function(){Swal.fire({title:"Sweet!",text:"Modal with a custom image.",imageUrl:"assets/images/logo-sm.png",imageHeight:40,confirmButtonColor:"#038edc",animation:!1})}),
            // document.getElementById("sa-close").addEventListener("click",function(){var e;Swal.fire({title:"Auto close alert!",html:"I will close in <strong></strong> seconds.",timer:2e3,timerProgressBar:!0,didOpen:function(){Swal.showLoading(),e=setInterval(function(){var e,t=Swal.getHtmlContainer();!t||(e=t.querySelector("b"))&&(e.textContent=Swal.getTimerLeft())},100)},onClose:function(){clearInterval(e)}}).then(function(e){e.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")})}),
            // document.getElementById("custom-html-alert").addEventListener("click",function(){Swal.fire({title:"<i>HTML</i> <u>example</u>",icon:"info",html:'You can use <b>bold text</b>, <a href="//Themesdesign.in/">links</a> and other HTML tags',showCloseButton:!0,showCancelButton:!0,confirmButtonClass:"btn btn-success",cancelButtonClass:"btn btn-danger ml-1",confirmButtonColor:"#47bd9a",cancelButtonColor:"#f34e4e",confirmButtonText:'<i class="fas fa-thumbs-up me-1"></i> Great!',cancelButtonText:'<i class="fas fa-thumbs-down"></i>'})}),
            // document.getElementById("sa-position").addEventListener("click",function(){Swal.fire({position:"top-end",icon:"success",title:"Your work has been saved",showConfirmButton:!1,timer:1500})}),
            // document.getElementById("custom-padding-width-alert").addEventListener("click",function(){Swal.fire({title:"Custom width, padding, background.",width:600,padding:100,confirmButtonColor:"#038edc",background:"#fff url(assets/images/auth-bg-2.jpg)"})}),
            // document.getElementById("ajax-alert").addEventListener("click",function(){Swal.fire({title:"Submit email to run ajax request",input:"email",inputPlaceholder:"Enter your email address",showCancelButton:!0,confirmButtonText:"Submit",showLoaderOnConfirm:!0,confirmButtonColor:"#038edc",cancelButtonColor:"#f34e4e",preConfirm:function(n){return new Promise(function(e,t){setTimeout(function(){"taken@example.com"===n?t("This email is already taken."):e()},2e3)})},allowOutsideClick:!1}).then(function(e){Swal.fire({icon:"success",title:"Ajax request finished!",confirmButtonColor:"#038edc",html:"Submitted email: "+e})})});
        </script>
            @stack('js')
    </body>

</html>

