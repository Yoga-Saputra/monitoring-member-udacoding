<!DOCTYPE html>
<html>
<head>
    @include('template.partials._head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="{{ route('dashboard') }}" class="logo" style="background-color:#40962d !important;">
                <span class="logo-mini"><b>U</b></span>
                <span class="logo-lg">Mentoring <b>Udacoding</b></span>
            </a>
            <nav class="navbar navbar-static-top" style="background-color:#48aa33 !important;">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!--<img src="{{ url('/adminlte/dist/img/avatar5.png') }}" class="user-image" alt="User Image">-->
                                    <span class="hidden-xs">{{ Auth::user()->name }} </span>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header" style="background-color: #48aa33 ;">
                                        <img src="{{ asset ('storage/app/user_pic/'. auth()->user()->image) }}" alt="Belum ada Foto">
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ route('dashboard.admin') }}" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        @include('template.partials._sidebar')
        <div class="content-wrapper">
            @yield('submenu')
            <section class="content">
                @if (session('error'))
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    harap cek form inputan
                    </div>
                @endif
                <div class="container-fluid">
                    @if(session('success'))
                    <div class="alert alert-dismissible m-2" role="alert" style="background-color: #48aa33 !important; color:#fff">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i>
                    {{session('success')}}
                    </div>
                    @endif
                    <div class="box">
                        <div class="box-header" style="border-bottom: 1px solid #f4f4f4 !important;">
                            <h3 class="box-title">{{ $list }}</h3>
                            <div class="box-tools" >
                                @yield('modal')
                            </div>
                        </div>
                    @yield('content')
                    </div>
                    @yield('profile')
                </div>
            </section>
        </div>
        @include('template.partials._footer')
    </div>
    @include('template.partials._script')
</body>

</html>
