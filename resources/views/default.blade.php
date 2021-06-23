<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('Judul') RENTARK</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{Asset('favicon.ico')}}">

    <!-- page css -->
    @yield('style')
    <!-- Core css -->
    <link href="{{Asset('assets/css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="">
                        <img src="{{Asset('logo.png')}}" class="mt-1" height="50px" alt="Logo">
                        <img class="logo-fold" src="{{Asset('logowhite.png')}}" height="70px" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="">
                        <img src="{{Asset('logowhite.png')}}" alt="Logo">
                        <img class="logo-fold" src="{{Asset('logowhite.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                       
                    </ul>
                    <ul class="nav-right">
                        
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{Asset('user.png')}}"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="{{Asset('user.png')}}" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">{{Auth()->user()->name}}</p>
                                            <p class="m-b-0 opacity-07">{{Auth()->user()->level == 'user' ? "User" : "Admin" }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button  class="dropdown-item d-block p-h-15 p-v-10">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                                <span class="m-l-10">Logout</span>
                                            </div>
                                            <i class="anticon font-size-10 anticon-right"></i>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a href="{{Route('shop')}}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-shopping"></i>
                                </span>
                                <span class="title">Shop</span>
                            </a>
                        </li>
                        
                         @if (Auth()->user()->level == 'user')
                             <li class="nav-item dropdown">
                                <a href="{{Route('historyProduk')}}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-clock-circle"></i>
                                    </span>
                                    <span class="title">History Order</span>
                                </a>
                            </li>
                         @endif
                        @if (Auth()->user()->level == "admin")
                            <li class="nav-item dropdown">
                                <a href="{{Route('Transaksi')}}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-shop"></i>
                                    </span>
                                    <span class="title">Transaksi</span>
                                </a>
                            </li>

                             <li class="nav-item dropdown">
                                <a href="{{Route('user')}}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-usergroup-add"></i>
                                    </span>
                                    <span class="title">User</span>
                                </a>
                            </li>
                        @endif
                       
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                <div class="main-content">
                    
                    <div class="content">
                        @yield('konten')
                    </div>
                    <!-- Content goes Here -->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2021 RENTARK All rights reserved.</p>
                      
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
         
            <!-- Search End-->

            <!-- Quick View START -->
           
            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{Asset('assets/js/vendors.min.js')}}"></script>

    <!-- page js -->
    @yield('script')
    <!-- Core JS -->
    <script src="{{Asset('assets/js/app.min.js')}}"></script>

</body>

</html>