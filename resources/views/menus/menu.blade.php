


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/img/profile-picture12.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- <div class="hmenu" id="hmenu" id="menu"> -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header"> </li> -->
        <li class=" ">
          <a href="{{route ('pages.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Deposit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('cashdeposit.index') }}"><i class="fa fa-circle-o"></i> Cash </a></li>
            <li><a href="{{ route('bankdeposit.index')}}"><i class="fa fa-circle-o"></i> Bank </a></li>
            <li><a href="{{ route('bkashdeposit.index')}}"><i class="fa fa-circle-o"></i> Bkash/Nagad </a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('staff.index')}}"><i class="fa fa-circle-o"></i> Staff Info </a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span> Loan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('staffloan.index') }}"><i class="fa fa-circle-o"></i> Staff Loan </a></li>
            <li><a href="{{ route('othersloan.index') }}"><i class="fa fa-circle-o"></i> Others Loan </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i> <span>Expense</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('officeexpense.index') }}"><i class="fa fa-circle-o"></i> Office </a></li>
            <li><a href="{{ route('marketingexpense.index') }}"><i class="fa fa-circle-o"></i> Marketing </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i> <span> Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href=" "><i class="fa fa-circle-o"></i> Daily </a></li>
            <li><a href=" "><i class="fa fa-circle-o"></i> Monthly </a></li> -->
            <li><a href=" "><i class="fa fa-circle-o"></i> Deposit </a></li>
            <li><a href=" "><i class="fa fa-circle-o"></i> Expense </a></li>
            <li><a href=" "><i class="fa fa-circle-o"></i> Loan </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span> Settings </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('expenseCat.index') }}"><i class="fa fa-circle-o"></i> Create Expense Cat.  </a></li>
            <li><a href="{{route('register')}}"><i class="fa fa-circle-o"></i> Registration  </a></li>
          </ul>
        </li>

        <li class="treeview logout">
          <!-- <a href="#">
            <i class="fa fa-sign-out"></i> <span> Logout </span>
          </a> -->
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> <span> Logout </span>
          </a>
          <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
          </form>

        </li>

      </ul>
      <!-- </div> -->
    </section>
    <!-- /.sidebar -->
  </aside>