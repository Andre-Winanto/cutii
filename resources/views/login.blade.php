 {{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/pavicon.png') }}">
    <title>Login | BSIP Jambi</title>
</head>
<style>
    body {
        background-color: rgb(46, 48, 46);
        margin: 0;
        padding: 20px;
    }
</style>
<body >
    
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background:#049122;"> <br>
                <div class="featured-image mb-3">
                    <img src="{{ asset('assets/images/logo_icon.png') }}" class="img-fluid" style="width: 200px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    BSIP Jambi</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Gunakan Cutimu Dengan Bijak </small>
                   <p>
            </div>
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <form action="{{ url('login') }}" method="POST">

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ session('loginError') }}
                            </div>
                        @endif
                        @csrf
                        <div class="header-text mb-4">
                            <h2>Selamat Datang Di Sistem Pengajuan Cuti</h2>
                            <p>Masukan Email dan password dengan benar</p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="email"
                                placeholder="Email">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password"
                                placeholder="Password">
                        </div>

                        <div class="input-group mb-1">
                            <button class="btn btn-lg btn-primary w-100  fs-6">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>   --}}


{{-- <!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div
            class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
          bg-dark
        ">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db"><img src="../assets/images/logo.png" alt="logo" /></span>
                    </div>

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('loginError') }}
                        </div>
                    @endif



                    <!-- Form -->
                    <form class="form-horizontal mt-3" id="loginform" action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg" placeholder="email"
                                        aria-label="Username" name="email" aria-describedby="basic-addon1" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                                class="mdi mdi-lock fs-4"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password"
                                        aria-label="Password" name="password" aria-describedby="basic-addon1"
                                        required="" />
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <button class="btn btn-info" id="to-recover" type="button">
                                            <i class="mdi mdi-lock fs-4 me-1"></i> Lost password?
                                        </button>
                                        <button class="btn btn-success float-end text-white" type="submit">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you
                            instructions how to recover a password.</span>
                    </div>
                    <div class="row mt-3">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i
                                            class="mdi mdi-email fs-4"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address"
                                    aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                            <!-- pwd -->
                            <div class="row mt-3 pt-3 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success text-white" href="#" id="to-login"
                                        name="action">Back To Login</a>
                                    <button class="btn btn-info float-end" type="button" name="action">
                                        Recover
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader").fadeOut();
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $("#to-recover").on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $("#to-login").click(function() {
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/pavicon.png') }}">
    <title>Login | BSIP Jambi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #2f3834);
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
        }

        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .box-area {
            max-width: 900px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .left-box {
            background-color: #049122;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .left-box img {
            width: 150px;
            margin-bottom: 20px;
            animation: bounceIn 1s ease;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            60% {
                transform: scale(1.1);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }

        .left-box p {
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .left-box small {
            font-family: 'Courier New', Courier, monospace;
            font-size: 1rem;
        }

        .right-box {
            padding: 30px;
        }

        .header-text h2 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-control {
            border-radius: 10px;
            box-shadow: none;
        }

        .btn-primary {
            border-radius: 10px;
            background: #049122;
            border: none;
        }

        .btn-primary:hover {
            background: #0a6ceb;
        }

        @media (max-width: 767px) {
            .left-box,
            .right-box {
                padding: 20px;
            }

            .left-box img {
                width: 120px;
            }

            .left-box p {
                font-size: 1.2rem;
            }

            .left-box small {
                font-size: 0.9rem;
            }

            .header-text h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow-lg box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="{{ asset('assets/images/logo_icon.png') }}" class="img-fluid">
                </div>
                <p>BSIP Jambi</p>
                <small>Gunakan Cutimu Dengan Bijak</small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <form action="{{ url('login') }}" method="POST">

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ session('loginError') }}
                            </div>
                        @endif
                        @csrf
                        <div class="header-text mb-4">
                            <h3>Selamat Datang Di Sistem Informasi Pengajuan Cuti</h3>
                            <p>Masukan Email dan password dengan benar</p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" name="email"
                                placeholder="Email" required>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" name="password"
                                placeholder="Password" required>
                        </div>

                        <div class="input-group mb-1">
                            <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2VFnp7+bL8W6Sg6E+MdDk3gGLOi64X45FfH8eBvKq4RymHVH+8AB7qX0TkN" crossorigin="anonymous">
    </script>
</body>

</html>