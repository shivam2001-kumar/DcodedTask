@php
    $user = App\Models\registrationModel::where('id', Auth::guard('customer')->user()->id)->first();
    // echo $user;
@endphp
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="#" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('frontend/assets/images/cmlogo.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('frontend/assets/images/cmlogo.png') }}" alt="" height="80"></span>
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                 <!-- Dashboard Menu -->
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="""  role="button" aria-expanded="false" >
                        <i data-feather="home" class="icon-dual"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>
                @if($user->type=='admin')


                <!-- User Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/userview')}}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">User List</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/allblog')}}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">All Detail Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/blog')}}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Blog</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('blog').'/'.Auth::guard('customer')->user()->id }}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards"> Show Blog</span>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('/blog')}}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards">Blog</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('blog').'/'.Auth::guard('customer')->user()->id }}" id="user" role="button" aria-expanded="false" >
                        <i data-feather="users" class="icon-dual"></i> <span data-key="t-dashboards"> Show Blog</span>
                    </a>
                </li>
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>



