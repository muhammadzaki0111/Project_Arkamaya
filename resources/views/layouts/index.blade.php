<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Muhammad Zaki</title>
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        @include('layouts.sidebar')
        <div class="main-panel">
            @yield('content')
            @include('layouts.footer')
        </div>
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ asset('vendors/chart.js/Chart.min.js') }} "></script>
        <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('vendors/flot/jquery.flot.js') }} "></script>
        <script src="{{ asset('vendors/flot/jquery.flot.resize.js') }} "></script>
        <script src="{{ asset('vendors/flot/jquery.flot.categories.js') }}"></script>
        <script src="{{ asset('vendors/flot/jquery.flot.fillbetween.js') }} "></script>
        <script src="{{ asset('vendors/flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('vendors/flot/jquery.flot.pie.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ asset('/js/off-canvas.js') }}"></script>
        <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('/js/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="{{ asset('/js/dashboard.js') }}"></script>
</body>

</html>
