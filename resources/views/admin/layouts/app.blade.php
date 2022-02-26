<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from technext.github.io/dashmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 06:11:31 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/admin/img/favicon.html')}}" rel="icon">

    @include('admin.inc.styles')
    @yield("styles")
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->

        <!-- Spinner End --> 


        <!-- Sidebar Start -->
        @include('admin.inc.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.inc.navbar')
            <!-- Navbar End -->


            @yield("content")


            <!-- Footer Start -->
            @include('admin.inc.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @include('admin.inc.scripts')
    @yield("script")

    <script type="text/javascript">
    @if(Session()->has('success'))
        toastr.options = {"progressBar": true}
        toastr.success('{{ Session('success') }}')
    @endif
    @if(Session()->has('info'))
        toastr.options = {"progressBar": true}
        toastr.info('{{ Session('info') }}')
    @endif
    @if(Session()->has('error'))
        toastr.options = {"progressBar": true}
        toastr.error('{{ Session('error') }}')
    @endif
    @if(Session()->has('warning'))
        toastr.options = {"progressBar": true}
        toastr.warning('{{ Session('warning') }}')
    @endif
    function numbersonly(e) {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8) { //if the key isn't the backspace key (which we should allow)
            if (unicode != 46 && unicode > 31 && unicode < 48 || unicode > 57) //if not a number
                return false //disable key press
        }
    }
</script>
</body>


<!-- Mirrored from technext.github.io/dashmin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Feb 2022 06:11:31 GMT -->

</html>