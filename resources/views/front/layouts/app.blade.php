<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->

    <title>WAGE SHARE</title>

    @include('front.inc.styles')
    @yield("styles")
    <style type="text/css">
        #neon:hover span {
            animation: flicker 1s linear forwards;
        }

        #neon:hover #e {
            animation-delay: .2s;
        }

        #neon:hover #o {
            animation-delay: .5s;
        }

        #neon:hover #n2 {
            animation-delay: .6s;
        }

        #neon:hover #n3 {
            animation-delay: .8s;
        }

        #neon:hover #n4 {
            animation-delay: .9s;
        }

        #neon:hover #n5 {
            animation-delay: 1s;
        }

        #neon:hover #n6 {
            animation-delay: 1.3s;
        }

        #neon:hover #n7 {
            animation-delay: 1.5s;
        }

        #neon:hover #n8 {
            animation-delay: 1.6s;
        }

        @keyframes flicker {
            0% {
                color: #333;
            }

            5%,
            15%,
            25%,
            30%,
            100% {
                color: #23c686;
            }

            10%,
            20% {
                color: #23c686;
                text-shadow: none;
            }
        }

        #neon:focus {
            outline: none;
        }

        #neon {
            display: flex;
            margin-left: 4px;
            margin-top: 4px;
            align-items: center;
        }

        #neon span {
            font-size: 37px;
            font-weight: 700;
            color: #2a2a2a;
            margin: 0;
            margin-left: 1px;
        }

        .main-heading {
            display: flex;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('front.inc.navbar')
    <!-- ***** Header Area End ***** -->

    @yield("content")

    <!-- Footer Start -->
    @include('front.inc.footer')
    <!-- Footer End -->

    <!-- Scripts -->
    @include('front.inc.scripts')
    @yield("script")

</body>

</html>