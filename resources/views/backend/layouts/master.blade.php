<!DOCTYPE html>
<html lang="en" class="loading">
<!-- BEGIN : Head-->
<head>
    
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="BackOffice for Goal Achieve">
    <meta name="keywords" content="New Today">
    <meta name="author" content="top developer">
    <title>admin | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('app-assets/img/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('app-assets/img/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('app-assets/img/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('app-assets/img/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/img/ico/favicon.ico')}}">
    <link rel="shortcut icon" type="image/png" href="{{asset('app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/chartist.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- END VENDOR CSS-->
    @yield('style')
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <style>
        th,td{
            text-align: center;
        }
        .aster{
            color: red;
        }

    </style>


</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
<body data-col="2-columns" class=" 2-columns ">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">


    <!-- main menu-->
    <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
    <div data-active-color="white" data-background-color="man-of-steel" data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
            <div class="logo clearfix"><a href="" class="logo-text float-left">
                    <div class="logo-img"><img src="{{asset('app-assets/img/logo.png')}}"/></div><span class="text align-middle" style="font-size:20px;">BACKOFFICE</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                    <li class="{{Route::is('home') ? 'active':''}} nav-item"><a href=""><i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
                    </li>
                    
                    <li class="{{Request::is('backend/users') ? 'active':''}} nav-item"><a href="{{route('users_all')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Users</span></a>
                    </li>
                    

                    <li class="{{Request::is('*/users/consultant') ? 'active':''}} nav-item"><a href="{{route('users_all',['role'=>'consultant'])}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Consultants</span></a>
                    </li>
                    

                    


                 

                    
                    <li class="{{Request::is('backend/categories/*') ? 'active':''}} nav-item"><a href="{{route('categories_index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Categories</span></a></li>
                    





                    
                    <li class="{{Request::is('backend/blogs/*') ? 'active':''}} nav-item"><a href="{{route('speciality_index')}}"><i class="ft-home"></i><span data-i18n="" class="menu-title">Specialities</span></a></li>
                    

                   

                    
                     
                    






                   <!--  <li class="{{Route::is('user*') ? 'active':''}} nav-item"><a href=""><i class="ft-home"></i><span data-i18n="" class="menu-title">Reviews</span></a></li>
                    <li class="{{Route::is('user*') ? 'active':''}} nav-item"><a href=""><i class="ft-home"></i><span data-i18n="" class="menu-title">Contact Messages</span></a></li>
                    <li class="{{Route::is('user*') ? 'active':''}} nav-item"><a href=""><i class="ft-home"></i><span data-i18n="" class="menu-title">Plans</span></a></li>
                    
                    <li class="{{Route::is('user*') ? 'active':''}} nav-item"><a href=""><i class="ft-home"></i><span data-i18n="" class="menu-title">Stripe Keys</span></a></li>
                    

                    <li class="has-sub nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title">Manage Website</span></a>
                        <ul class="menu-content">
                            <li class="{{Route::is('member_page') ? 'active':''}}"><a href="" class="menu-item">Home Page</a></li>
                            <li class="{{Route::is('member_page') ? 'active':''}}"><a href="" class="menu-item">Contact Us</a></li>
                            <li class="{{Route::is('member_page') ? 'active':''}}"><a href="" class="menu-item">About Us</a></li>
                        </ul>
                    </li> -->


                    @can('manage_roles')
                    <li class="has-sub {{Request::is('backend/roles/*')?'active':''}} nav-item"><a href="#"><i class="ft-box"></i><span data-i18n="" class="menu-title">Roles & Permissions</span></a>
                        <ul class="menu-content">
                            <li class="{{Route::is('member_page') ? 'active':''}}"><a href="{{route('show_all_roles')}}" class="menu-item">Roles</a></li>
                            <!-- <li class="{{Route::is('member_page') ? 'active':''}}"><a href="" class="menu-item">Permissions</a></li> -->
                        </ul>
                    </li>
                    @endcan
                  

                </ul>
            </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
    </div>
    <!-- / main menu-->


    <!-- Navbar (Header) Starts-->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
                <form role="search" class="navbar-form navbar-right mt-1">
                    <div class="position-relative has-icon-right">
                        <input id="what_are_you_looking_for" type="text" placeholder="Search" class="form-control round"/>
                        <div class="form-control-position"><i class="ft-search"></i></div>
                    </div>
                </form>
            </div>

            
            <div class="navbar-container">
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-2 d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                                <p class="d-none">fullscreen</p></a></li>
                        <li class="dropdown nav-item">
                            <a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative" style="display: inline-flex"><p class="mt-2 mr-3"><b>Adnan ch</b></p>
                
                                <img class="media-object d-flex mr-3 round-media" src="{{asset('app-assets/img/default-avatar.png')}}" alt="Generic placeholder image" style="width: 50px;height: 50px;border-radius: 50%;border: 3px solid #3eaef3;">
                         
                            </a>
                            <div aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                                <a href="" class="dropdown-item py-1"><i class="ft-settings mr-2"></i><span>User Settings</span></a>
                                <div class="dropdown-divider"></div><a href="{{route('admin_logout')}}" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                               

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        
        <div class="main-content">
            <div>
                @if($message = Session::get('success'))
                    <div class="alert alert2 alert-success alert-block">
                        <strong> {{$message}} </strong>
                    </div>
                @elseif($message=Session::get('error'))
                    <div class="alert alert2 alert-danger alert-block">
                        <strong> {{$message}} </strong>
                    </div>
                @endif
            </div>

            <div>
            @if($errors->any())
            <div class="alert alert2 alert-danger alert-block">{{ implode('', $errors->all(':message')) }}</div>
                
            @endif
            </div>

            @yield('main_content')
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <!-- <footer class="footer footer-static footer-light">
            <p class="clearfix text-muted text-sm-center px-2"><span> 2019 - 2020 <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Lee Bin </a>, All rights reserved. </span></p>
        </footer> -->
        <!-- End : Footer-->

        @yield('scripts')

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/core/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/prism.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pace/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
@yield('script')
<script>
    $('.alert-success').fadeIn().delay(5000).fadeOut();
    $('[data-toggle="tooltip"]').tooltip()
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('app-assets/js/enable-datepicker.js')}}"></script>

<!-- BEGIN APEX JS-->
<script src="{{asset('app-assets/js/app-sidebar.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<!-- END APEX JS-->
</body>
<!-- END : Body-->
</html>