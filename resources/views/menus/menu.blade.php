<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->image ? asset(auth()->user()->image) :  asset('assets/img/profile-picture12.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <br>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="@if (isset($menu) && $menu == 'dashboard') active @endif">
                <a href="{{ route('pages.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard </span>
                </a>
            </li>

            <li class="treeview @if (isset($menu) && $menu == 'deposit') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Deposit</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'cashDeposit') active @endif"><a
                            href="{{ route('cash-deposit.index') }}"><i class="fa fa-circle-o"></i> Cash </a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'bankDeposit') active @endif"><a
                            href="{{ route('bank-deposit.index') }}"><i class="fa fa-circle-o"></i> Bank </a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'mobileBankingDeposit') active @endif"><a
                            href="{{ route('mobile-banking-deposit.index') }}"><i class="fa fa-circle-o"></i> Mobile
                            Banking</a></li>
                </ul>
            </li>

            <li class="treeview @if (isset($menu) && $menu == 'staff') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'staff') active @endif"><a href="{{ route('staff.index') }}"><i
                                class="fa fa-circle-o"></i> Staff Info</a></li>
                </ul>
            </li>

            <li class="treeview @if (isset($menu) && $menu == 'loan') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-money"></i> <span> Loan </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'staffLoan') active @endif"><a
                            href="{{ route('staff-loan.index') }}"><i class="fa fa-circle-o"></i> Staff Loan</a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'othersLoan') active @endif"><a
                            href="{{ route('others-loan.index') }}"><i class="fa fa-circle-o"></i> Others Loan</a></li>
                </ul>
            </li>


            <li class="treeview @if (isset($menu) && $menu == 'expense') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-dollar"></i> <span>Expense</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'officeExpense') active @endif"><a
                            href="{{ route('office-expense.index') }}"><i class="fa fa-circle-o"></i> Office </a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'marketingExpense') active @endif"><a
                            href="{{ route('marketing-expense.index') }}"><i class="fa fa-circle-o"></i> Marketing </a>
                    </li>
                </ul>
            </li>

            <li class="treeview @if (isset($menu) && $menu == 'report') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-file-text"></i> <span> Reports </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'deposit') active @endif"><a
                            href="{{ route('report.deposit') }}"><i class="fa fa-circle-o"></i> Deposit</a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'expense') active @endif"><a
                            href="{{ route('report.expense') }}"><i class="fa fa-circle-o"></i> Expense</a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'loan') active @endif"><a
                            href="{{ route('report.loan') }}"><i class="fa fa-circle-o"></i> Loan</a></li>

                    {{-- <li><a href=" "><i class="fa fa-circle-o"></i> Daily </a></li> --}}
                    {{-- <li><a href=" "><i class="fa fa-circle-o"></i> Monthly </a></li> --}}
                </ul>
            </li>

            <li class="treeview @if (isset($menu) && $menu == 'settings') active menu-open @endif">
                <a href="#">
                    <i class="fa fa-cog"></i> <span> Settings </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if (isset($child_menu) && $child_menu == 'expenseCategory') active @endif"><a
                            href="{{ route('expense-category.index') }}"><i class="fa fa-circle-o"></i> Expense
                            Category</a></li>
                    <li class="@if (isset($child_menu) && $child_menu == 'user') active @endif"><a
                            href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>
                </ul>
            </li>


            <li class="treeview logout">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> <span> Logout </span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>

        </ul>
    </section>
</aside>
