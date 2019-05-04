<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<!-- themes css -->

<link rel="stylesheet" href="{{url('/')}}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{url('/')}}/css/line-icons.css">
<link rel="stylesheet" href="{{url('/')}}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{url('/')}}/css/owl.theme.default.css">
<link rel="stylesheet" href="{{url('/')}}/css/slicknav.min.css">
<link rel="stylesheet" href="{{url('/')}}/css/animate.css">
<link rel="stylesheet" href="{{url('/')}}/css/main.css">
<link rel="stylesheet" href="{{url('/')}}/css/responsive.css">

</head>
<body>

<header id="home" class="hero-area">

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
<div class="container">
<div class="theme-header clearfix">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="{{ url('/') }}" class="navbar-brand"><img height="50" src="{{url('/')}}/img/logo.png" alt=""></a>
</div>
<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto w-100 justify-content-end">
<li class="nav-item dropdown active">
<a class="nav-link dropdown-toggle" href="{{ url('/') }}">
Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contact.html">
Contact
</a>
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
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest
<li class="button-group">
<a href="/jobs/create" class="button btn btn-common">Post a Job</a>
</li>
</ul>
</div>
</div>
</div>
<div class="mobile-menu" data-logo="{{url('/')}}/img/logo-mobile.png"></div>
</nav>


@yield('content')


<footer>

<section class="footer-Content">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-xs-12">
<div class="widget">
<div class="footer-logo"><img src="{{url('/')}}/img/logo-footer.png" alt=""></div>
<div class="textwidget">
<p>Sed consequat sapien faus quam bibendum convallis quis in nulla. Pellentesque volutpat odio eget diam cursus semper.</p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-4 col-xs-12">
<div class="widget">
<h3 class="block-title">Quick Links</h3>
<ul class="menu">
<li><a href="#">About Us</a></li>
<li><a href="#">Support</a></li>
<li><a href="#">License</a></li>
<li><a href="#">Contact</a></li>
</ul>
<ul class="menu">
<li><a href="#">Terms & Conditions</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">Refferal Terms</a></li>
<li><a href="#">Product License</a></li>
</ul>
</div>
 </div>
<div class="col-lg-3 col-md-4 col-xs-12">
<div class="widget">
<h3 class="block-title">Subscribe Now</h3>
<p>Sed consequat sapien faus quam bibendum convallis.</p>
<form method="post" id="subscribe-form" name="subscribe-form" class="validate">
<div class="form-group is-empty">
<input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
<button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
<div class="clearfix"></div>
</div>
</form>
<ul class="mt-3 footer-social">
<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
<li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
<li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
<li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</section>


<div id="copyright">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p>Designed and Developed by <a href="https://uideck.com/" rel="nofollow">AppsVill</a></p>
</div>
</div>
</div>
</div>
</div>

</footer>


<a href="#" class="back-to-top">
<i class="lni-arrow-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>

<script src="{{url('/')}}/js/jquery-min.js"></script>
<script src="{{url('/')}}/js/popper.min.js"></script>
<script src="{{url('/')}}/js/bootstrap.min.js"></script>
<!-- <script src="{{url('/')}}/js/color-switcher.js"></script> -->
<script src="{{url('/')}}/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/js/jquery.slicknav.js"></script>
<script src="{{url('/')}}/js/jquery.counterup.min.js"></script>
<script src="{{url('/')}}/js/waypoints.min.js"></script>
<script src="{{url('/')}}/js/form-validator.min.js"></script>
<script src="{{url('/')}}/js/contact-form-script.js"></script>
<script src="{{url('/')}}/js/main.js"></script>
</body>
</html>