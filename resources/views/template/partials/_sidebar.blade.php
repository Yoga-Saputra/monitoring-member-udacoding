<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        {{-- <div class="user-panel">
            <div class="pull-left image">

                <img src="{{ asset ('storage/app/user_pic/'. auth()->user()->image) }}" style="padding: " class="img-circle" alt="Belum ada Foto">
            </div>
            <div class="pull-left info">
                <br><p><i class="fa fa-circle text-success"></i>   Online</p>
                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div> --}}
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::user()->level =='admin')
                <li class=" {{  request()->is('dashboard') ? 'active' : '' }} ">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class=" {{  request()->is('dashboard/participant') ? 'active' : '' }} ">
                    <a href="{{ route('participant') }}" class="color-bg">
                        <i class="fa fa-users"></i><span>Peserta</span>
                    </a>
                </li>
                <li class=" {{  request()->is('dashboard/user') ? 'active' : '' }} ">
                    <a href="{{ route('user') }}">
                        <i class="fa fa-users"></i> <span>user</span>
                    </a>
                </li>
                <li class=" {{  request()->is('dashboard/program') ? 'active' : '' }} ">
                    <a href="{{ route('program') }}">
                        <i class="fa fa-files-o"></i><span>Program</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cubes {{  request()->is('week1') ? 'active' : '' }}{{  request()->is('week2') ? 'active' : '' }}{{  request()->is('week3') ? 'active' : '' }}"></i> <span>Grade</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{  request()->is('week1') ? 'active' : '' }}"><a href="{{ route('week1') }}"><i class="fa fa-calendar-check-o"></i>Week 1</a></li>
                        <li class="{{  request()->is('week2') ? 'active' : '' }}"><a href="{{ route('week2') }}"><i class="fa fa-calendar-check-o"></i>Week 2</a></li>
                        <li class="{{  request()->is('week3') ? 'active' : '' }}"><a href="{{ route('week3') }}"><i class="fa fa-calendar-check-o"></i>Week 3</a></li>
                        <li class="{{  request()->is('week4') ? 'active' : '' }}"><a href="{{ route('week4') }}"><i class="fa fa-calendar-check-o"></i>Week 4</a></li>
                        <li class="{{  request()->is('week5') ? 'active' : '' }}"><a href="{{ route('week5') }}"><i class="fa fa-calendar-check-o"></i>Week 5</a></li>
                        <li class="{{  request()->is('week6') ? 'active' : '' }}"><a href="{{ route('week6') }}"><i class="fa fa-calendar-check-o"></i>Week 6</a></li>
                        <li class="{{  request()->is('week7') ? 'active' : '' }}"><a href="{{ route('week7') }}"><i class="fa fa-calendar-check-o"></i>Week 7</a></li>
                        <li class="{{  request()->is('week8') ? 'active' : '' }}"><a href="{{ route('week8') }}"><i class="fa fa-calendar-check-o"></i>Week 8</a></li>
                        <li class="{{  request()->is('week9') ? 'active' : '' }}"><a href="{{ route('week9') }}"><i class="fa fa-calendar-check-o"></i>Week 9</a></li>
                        <li class="{{  request()->is('week10') ? 'active' : '' }}"><a href="{{ route('week10') }}"><i class="fa fa-calendar-check-o"></i>Week 10</a></li>
                        <li class="{{  request()->is('week11') ? 'active' : '' }}"><a href="{{ route('week11') }}"><i class="fa fa-calendar-check-o"></i>Week 11</a></li>
                        <li class="{{  request()->is('week12') ? 'active' : '' }}"><a href="{{ route('week12') }}"><i class="fa fa-calendar-check-o"></i>Week 12</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bullhorn "></i><span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('web') }}"><i class="fa fa-file-text"></i>Program Web</a></li>
                        <li class="">
                            <a href="{{ route('android') }}"><i class="fa fa-file-text"></i>Program Android</a>
                        </li>
                        <li class=""><a href="{{ route('ios') }}"><i class="fa fa-file-text"></i>Program Ios</a></li>
                        <li class="active"><a href="{{ route('flutter') }}"><i class="fa fa-file-text"></i>Program Flutter</a></li>
                        <li class="active"><a href="{{ route('kotlin') }}"><i class="fa fa-file-text"></i>Program Kotlin</a></li>
                        <li class="active"><a href="{{ route('ui_design') }}"><i class="fa fa-file-text"></i>Program UI Design</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cog "></i><span>Setting</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @if(Auth::user()->level =='admin')
                        <li class="">
                            <a href="{{ route('portofolio') }}"><i class="fa fa-briefcase"></i>Portofolio</a>
                        </li>
                        <li class="">
                            <a href="{{ route('testimoni') }}"><i class="fa  fa-quote-right"></i>Testimoni</a>
                        </li>
                        <li class="">
                            <a href="{{ route('slider') }}"><i class="fa fa-sliders"></i>Slider</a>
                        </li>
                        @elseif(Auth::user()->level =='peserta')
                        <li class="">
                            <a href="{{ route('dashboard.admin') }}"><i class="fa fa-user"></i>Profile</a>
                        </li>
                        @endif
                    </ul>
                </li>
            @elseif(Auth::user()->level =='peserta')
            <li class=" {{  request()->is('dashboard') ? 'active' : '' }} ">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cubes {{  request()->is('week1') ? 'active' : '' }}{{  request()->is('week2') ? 'active' : '' }}{{  request()->is('week3') ? 'active' : '' }}"></i> <span>Grade</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{  request()->is('week1') ? 'active' : '' }}"><a href="{{ route('week1') }}"><i class="fa fa-calendar-check-o"></i>Week 1</a></li>
                    <li class="{{  request()->is('week2') ? 'active' : '' }}"><a href="{{ route('week2') }}"><i class="fa fa-calendar-check-o"></i>Week 2</a></li>
                    <li class="{{  request()->is('week3') ? 'active' : '' }}"><a href="{{ route('week3') }}"><i class="fa fa-calendar-check-o"></i>Week 3</a></li>
                    <li class="{{  request()->is('week4') ? 'active' : '' }}"><a href="{{ route('week4') }}"><i class="fa fa-calendar-check-o"></i>Week 4</a></li>
                    <li class="{{  request()->is('week5') ? 'active' : '' }}"><a href="{{ route('week5') }}"><i class="fa fa-calendar-check-o"></i>Week 5</a></li>
                    <li class="{{  request()->is('week6') ? 'active' : '' }}"><a href="{{ route('week6') }}"><i class="fa fa-calendar-check-o"></i>Week 6</a></li>
                    <li class="{{  request()->is('week7') ? 'active' : '' }}"><a href="{{ route('week7') }}"><i class="fa fa-calendar-check-o"></i>Week 7</a></li>
                    <li class="{{  request()->is('week8') ? 'active' : '' }}"><a href="{{ route('week8') }}"><i class="fa fa-calendar-check-o"></i>Week 8</a></li>
                    <li class="{{  request()->is('week9') ? 'active' : '' }}"><a href="{{ route('week9') }}"><i class="fa fa-calendar-check-o"></i>Week 9</a></li>
                    <li class="{{  request()->is('week10') ? 'active' : '' }}"><a href="{{ route('week10') }}"><i class="fa fa-calendar-check-o"></i>Week 10</a></li>
                    <li class="{{  request()->is('week11') ? 'active' : '' }}"><a href="{{ route('week11') }}"><i class="fa fa-calendar-check-o"></i>Week 11</a></li>
                    <li class="{{  request()->is('week12') ? 'active' : '' }}"><a href="{{ route('week12') }}"><i class="fa fa-calendar-check-o"></i>Week 12</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bullhorn "></i><span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('web') }}"><i class="fa fa-file-text"></i>Program Web</a></li>
                    <li class="">
                        <a href="{{ route('android') }}"><i class="fa fa-file-text"></i>Program Android</a>
                    </li>
                    <li class=""><a href="{{ route('ios') }}"><i class="fa fa-file-text"></i>Program Ios</a></li>
                    <li class="active"><a href="{{ route('flutter') }}"><i class="fa fa-file-text"></i>Program Flutter</a></li>
                    <li class="active"><a href="{{ route('kotlin') }}"><i class="fa fa-file-text"></i>Program Kotlin</a></li>
                    <li class="active"><a href="{{ route('ui_design') }}"><i class="fa fa-file-text"></i>Program UI Design</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog "></i><span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->level =='admin')
                    <li class="">
                        <a href="{{ route('portofolio') }}"><i class="fa fa-briefcase"></i>Portofolio</a>
                    </li>
                    <li class="">
                        <a href="{{ route('testimoni') }}"><i class="fa  fa-quote-right"></i>Testimoni</a>
                    </li>
                    <li class="">
                        <a href="{{ route('slider') }}"><i class="fa fa-sliders"></i>Slider</a>
                    </li>
                    @elseif(Auth::user()->level =='peserta')
                    <li class="">
                        <a href="{{ route('dashboard.admin') }}"><i class="fa fa-user"></i>Profile</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
