

<header class="main-header">
    <!-- Logo -->
    <a href="{{route ('pages.home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WG</b> </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Wafgroup</b> </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ auth()->user()->image ? asset(auth()->user()->image) :  asset('assets/img/profile-picture12.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <img src="{{ auth()->user()->image ? asset(auth()->user()->image) :  asset('assets/img/profile-picture12.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-success btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">

                    <a href="{{ route('logout') }}" class="btn btn-warning btn-flat" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                      @csrf
                    </form>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>



