<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIKOITAMA - IOT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/public/assets/images/icon/favicon.ico') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/public/assets/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/public/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/fa/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/assets/css/slicknav.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('/public/assets/css/typography.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/public/assets/css/default-css.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('/public/assets/css/styles.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('/public/assets/css/responsive.css') }}"> -->
    <!-- modernizr css -->
    <script src="{{ asset('/public/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    {{-- tambahan--}}
    <script src="{{ asset('public/assets/corelib/core.js') }}"></script>
    <link href="{{asset('public/assets/corelib/ajax.css')}}" rel="stylesheet" type="text/css">
    <script>
        baseURL = '{{url("/")}}';
    </script>
    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
    @yield('style')
</head>