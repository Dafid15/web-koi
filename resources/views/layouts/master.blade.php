<!doctype html>
<html class="no-js" lang="en">
{{--section header--}}
@include('partials._header')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->

<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
@include('partials._sidebar-menu')
<!-- sidebar menu area end -->

    <!-- main content area start -->
@include('partials._header-area')
<!-- page content -->
    <div class="main-content">
        <div class="main-content-inner">
            @yield('content')

        </div>
    </div>

    <!-- /page content -->
{{--@include('partials._main-content')--}}
<!-- main content area end -->

    <!-- footer area start-->
@include('partials._footer')
<!-- footer area end-->

</div>
<!-- page container area end -->
<!-- offset area start -->
@include('partials._offset-area')
<!-- offset area end -->
<!-- jquery latest version -->
</body>
</html>
