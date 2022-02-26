<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from technext.github.io/dashmin/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 06:11:32 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>ADMIN - Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{ asset('assets/admin/img/favicon.html')}}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('assets/admin/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="../../cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                {!! Form::open(array('route' => 'admin.login','method'=>'POST')) !!}
                @csrf
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                        {!! Form::email('email', null, array('placeholder' => 'E-mail','id'=>'floatingInput','class' => 'form-control')) !!}                            
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                        
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/admin/js/jquery-3.4.1.min.js')}}"></script>
    <script src="../../cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/lib/chart/chart.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{ asset('assets/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/admin/js/main.js')}}"></script>
</body>
<!-- Mirrored from technext.github.io/dashmin/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 06:11:32 GMT -->
</html>