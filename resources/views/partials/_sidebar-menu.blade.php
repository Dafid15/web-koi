<!-- <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="#">MASTER KOI</a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{url('/')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{url('remote-device')}}" aria-expanded="true"><i class="ti-move"></i><span>Remote Device</span></a>
                    </li>
                    <li>
                        <a href="{{url('/logout')}}" aria-expanded="true"><i class="ti-move"></i><span>Logout</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div> -->
<div class="" id="sidebar-wrapper">
    <div class="sidebar-heading animated fadeIn slower">
      <div class="border-foto">
          <img src="{{ asset('/public/assets/images/user.jpg') }}" class="foto">
      </div>
      <div class="caption-foto">
        <p class="text-white"><b>Dafid</b><br>Surabaya</p>
      </div>
    </div>
    <div class="list-group list-group-flush mt-5 ml-2">
        <div class="row">
            <div class="col-lg-6 col-sm-12 menu mt-2 animated fadeIn slower">
                <center>
                    <a href="{{url('/')}}" class="btn btn-menu <?php if($page=='index'){echo 'active-menu';}?> menu-item" id="menu1">
                        <i class="fas fa-columns"></i>
                        <p class="ket-menu <?php if($page=='index'){echo 'active-ket';}?>"style="font-size:10pt">Dashboard</p>
                    </a> 
                </center>
            </div>
            <div class="col-lg-6 col-sm-12 mt-2 animated fadeIn slow" >
                <center>
                    <a href="{{url('remote-device')}}" class="btn btn-menu menu-item <?php if($page=='remote') {echo 'active-menu';}?>" id="menu2">
                       <i class="fas fa-toggle-on"></i>
                        <p class="ket-menu <?php if($page=='remote'){echo 'active-ket';}?>" style="font-size:10pt">Remote Device</p>
                    </a>
                </center>
            </div>
        </div>
    </div>
</div>
