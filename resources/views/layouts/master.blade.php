<!doctype html>
<html class="no-js" lang="en">
{{--section header--}}
@include('partials._header')
<body>
<div class="background"> 
</div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->

<!-- page container area start -->
<div class="content">
      <div class="d-flex" id="wrapper">
        <!-- <div class="page-container"> -->
            <!-- sidebar menu area start -->
        @include('partials._sidebar-menu')
        <!-- sidebar menu area end -->

            <!-- main content area start -->
        <!-- page content -->
            <!-- <div class="main-content"> -->
            <div id="page-content-wrapper" class="">
            @include('partials._header-area2')
                <div class="container-fluid content-child animated fadeIn slower">
                    <h1 class="mt-4 text-white">Hai,Dafid!</h1>
                <!-- <h1 class="mt-4">Simple Sidebar</h1> -->
                    <p class="text-white">Welcome to SIKOITAMA.</p>
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item "><a href="#" class="text-white">Home</a></li>
                        <li class="breadcrumb-item breadcrumb-active">Dashboard</li>
                    </ol>
                    @yield('content')
                </div>
            </div>

            <!-- /page content -->
        <!-- {{--@include('partials._main-content')--}} -->
        <!-- main content area end -->

            <!-- footer area start-->
        @include('partials._footer')
        <!-- footer area end-->
        <!-- </div> -->
      </div>
</div>      
  <!-- Menu Toggle Script -->
  <script>
    var x = document.getElementById("btn-sidebar");
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      if (x.className === "fas fa-align-justify text-white") {
        x.className = "fas fa-align-left text-white";
      } else {
        x.className = "fas fa-align-justify text-white";
      }
    });
    </script>
    

<!-- page container area end -->
<!-- offset area start -->
<!-- @include('partials._offset-area') -->
<!-- offset area end -->
<!-- jquery latest version -->
</body>
</html>
