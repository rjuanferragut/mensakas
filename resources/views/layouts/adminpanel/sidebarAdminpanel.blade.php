@section('sidebar')
<header class="header">
          <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0 overflow-hidden">
            <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> -->
            <!-- <a class="navbar-brand p-0 mr-5" href="#"></a> -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
              <div class="float-left"> <a href="#" class="button-left"><span class="fa fa-fw fa-bars "></span></a> </div>
              <ul class="navbar-nav">

              <li class="nav-item dropdown  user-menu ">
                <a class="nav-link dropdown-toggle d-inline-block" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="http://via.placeholder.com/160x160" class="user-image" alt="User Image" >
                  <span class="d-sm-block">Develop</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
</header>

      <div class="float-left">
        <aside>
          <div class="sidebar left position-absolute"  style="height: 1000px;">
            <a href="#" class="button-left text-white ml-2 d-sm-block d-md-none"><span class="fa fa-fw fa-bars "></span></a>
            <div class="user-panel d-sm-block d-md-none">
              <div class="pull-left image">
                <img src="http://via.placeholder.com/160x160" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>Develop</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a><br/>
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">
              <li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> Dashboards </span> <span class="fa fa-chevron-left pull-right"></span> </a>
              <ul class="sub-menu collapse" id="dashboard">
                <li class="active"><a href="#">Users</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Menus</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Delivers</a></li>
              </ul>
            </li>
            <li> <a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a> </li>
            <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span> <span class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="products">
              <li class="active"><a href="#">CSS3 Animation</a></li>
              <li><a href="#">General</a></li>
              <li><a href="#">Buttons</a></li>
              <li><a href="#">Tabs & Accordions</a></li>
            </ul>
          </li>
    </ul>
    </div>

    </aside>
    </div>

@endsection
