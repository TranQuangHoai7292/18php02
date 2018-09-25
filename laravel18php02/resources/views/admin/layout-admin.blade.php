<!DOCTYPE html>
<html>
    @include('common.admin.header')
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar" >

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{url('styleAdmin/images/logo_sm.png')}}" alt="" height="35">
                        </span>                        
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-right-menu float-right mb-0">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                               <span class="ml-1">
                                @if (Auth::check())
                                {{Auth::user()->username}}
                                @endif
                                <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome Come</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Settings</span>
                                </a>
                                <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </a>

                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline menu-left mb-0">                        
                        <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>                        
                    </ul>
                </nav>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span>Thành Viên</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('manager-user')}}">Quản Lý Thành Viên</a></li>
                                    <li><a href="{{route('signin')}}">Thêm Thành Viên</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span>Sản Phẩm</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('manager-product')}}">Quản Lý Sản Phẩm</a></li>
                                    <li><a href="{{route('signup-product')}}">Thêm Sản Phẩm</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i><span>Danh Mục,Loại Sản Phẩm</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('manager-category')}}">Danh Mục Sản Phẩm</a></li>
                                    <li><a href="{{route('manager-type-products')}}">Loại Sản Phẩm</a></li>
                                    <li><a href="{{route('signup-type-products')}}">Thêm Mục Sản Phẩm</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span>Banner Trang Chủ</span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('manager-banner')}}">Quản Lý Banner</a></li>
                                    <li><a href="{{route('signup-banner')}}">Thêm Banner</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        @include('common.admin.footer')
    </body>
</html>