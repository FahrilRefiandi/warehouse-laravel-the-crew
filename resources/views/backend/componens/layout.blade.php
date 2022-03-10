
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend')}}/assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{asset('backend')}}/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"data-boxed-layout="full">
        @include('backend.componens.header')
        @include('backend.componens.sidebar')
        <div class="page-wrapper">
            @yield('content')

            <footer class="footer text-center">
                Warehouse. Designed and Developed by
                <a href="#">The Team</a>.
            </footer>
        </div>
    </div>

    <script src="{{asset('backend')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('backend')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="{{asset('backend')}}/dist/js/waves.js"></script>
    <script src="{{asset('backend')}}/dist/js/sidebarmenu.js"></script>
    <script src="{{asset('backend')}}/dist/js/custom.min.js"></script>
</body>

</html>
