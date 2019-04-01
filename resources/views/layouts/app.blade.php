<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Home') - Document Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container">
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href="index.html"><img src="{{asset('images/icon/logo.png')}}" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li><a href="{{route('home')}}"><i class="ti-home"></i> <span>{{__('Dashboard')}}</span></a></li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-server"></i><span>{{__('Master')}}</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('master.category')}}">Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-server"></i><span>{{__('Document')}}</span></a>
                            <ul class="collapse">
                                <li><a href="{{route('document.upload')}}">{{__('Upload')}}</a></li>
                                <li><a href="#">{{__('Browse')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    {{--<div class="search-box pull-left">--}}
                    {{--<form action="#">--}}
                    {{--<input type="text" name="search" placeholder="Search..." required>--}}
                    {{--<i class="ti-search"></i>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                </div>
                <!-- profile info & task notification -->
                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">@yield('title')</h4>
                        @yield('breadcrumb')
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="{{asset('images/author/avatar.png')}}" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hei, {{auth()->user()->name}}<i
                                    class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" id="btn-logout" href="#">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            @yield('content')
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright {{date('Y')}}. All right reserved.</p>
        </div>
    </footer>
    <!-- footer area end-->
    <form id="form-logout" method="post" action="{{route('logout')}}">
        @csrf
    </form>
</div>
<!-- page container area end -->
<!-- jquery latest version -->
<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

<!-- others plugins -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
    $(function () {
        $('#btn-logout').click(function () {
            $('#form-logout').submit();
        });
    })
</script>
</body>

</html>
