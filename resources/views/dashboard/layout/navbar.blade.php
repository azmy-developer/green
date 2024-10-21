<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">

        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                                                                                         data-feather="moon"></i></a>
            </li>



            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                                                           id="dropdown-user" href="#" data-bs-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">John Doe</span><span
                            class="user-status">Admin</span></div>
                    <span class="avatar"><img class="round"
                                              src="{{asset('dash/app-assets/images/portrait/small/avatar-s-11.jpg')}}"
                                              alt="avatar" height="40" width="40"><span
                            class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                    <a
                        class="dropdown-item"  href="{{ route('dashboard.logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="me-50" data-feather="power"></i>
                        Logout</a>

                    <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->
