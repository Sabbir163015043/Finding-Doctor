
<html>
<head>
    <title>Health Vault Everyone</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
    @stack('style-css')

</head>
<body>
<div class="header-top top-fixed">
    <div class="container">
        <div class="row">
            <header>
                <nav id='cssmenu'>
                    <div class="logo"><a href=""><img src="{{ asset('frontend/assets/image/logo.png')}}"></a></div>
                    <div id="head-mobile"></div>
                    <div class="button"></div>
                    <ul class="mainmenu">
                        <li class='active'><a href='{{route('frontpage')}}'>HOME</a></li>
                        <li><a href='#'>ABOUT US</a></li>
                        <li><a href='#'>PRODUCTS</a>
                            <ul>
                                <li><a href='#'>Product 1</a>
                                    <ul>
                                        <li><a href='#'>Sub Product</a></li>
                                        <li><a href='#'>Sub Product</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Product 2</a>
                                    <ul>
                                        <li><a href='#'>Sub Product</a></li>
                                        <li><a href='#'>Sub Product</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href='{{route('home')}}'>SERVICE</a></li>
                        <li><a href='#'>GALLERY</a></li>
                        @guest
                        <li><a href='{{ route('register') }}'>SIGNUP</a></li>
                        @endguest
                        @auth
                           <li><a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }} ({{Auth::user()->name}})
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form></li>
                        @endauth
                    </ul>
                </nav>
            </header>
        </div>
    </div>
</div>
