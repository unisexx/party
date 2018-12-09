<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('') }}" class="logo" target="_blank">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">พปชร.</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">พรรคพลังประชารัฐ</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#">
                        <span class="hidden-xs">
                            สวัสดี : <i>{{ Auth::user()->name }}</i>, สิทธิ์การใช้งาน : <i>{{ Auth::user()->roles()->first()->name }}</i>
                        </span>
                    </a>
                </li>

                <li class="dropdown messages-menu">
                    <a href="{{ url('logout') }}">
                        <i class="fa fa-power-off"></i> ออกจากระบบ
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</header>