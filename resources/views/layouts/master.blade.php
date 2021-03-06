<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/mycss')}}>
<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;

                        <div class="dropdown">
                <button class="dropbtn">Contact Us</button>
                 <div class="dropdown-content">
                         <b>Call:0717711324
                         Email:onelove@onelove.com</b>
                    </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                     <div class="dropdown">
                <button class="dropbtn">About Us</button>
                 <div class="dropdown-content">
                         <b>We are a Non-Profit Organisation<br>
                         aimed at making the world a better place.</b>
                    </div>
                    </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li><a></a></li>

                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <i class="fa fa-bell-o fa-2x" aria-hidden="true" style="color:green"></i>

                                    @if(auth()->user()->unreadNotifications->count())
                                    <span class="badge badge-light">{{auth()->user()->unreadNotifications->count()}}</span>
                                    @endif
                                </a>

                                <ul class="dropdown-menu">

                                        <!--admin must be an authenticated user-->
                                    @foreach(auth()->user()->notifications as $notification)

                                <li><a href="{{route('admin.newProposals')}}">{{$notification->data['data']}} </a></li>    

                                    @endforeach
                                    
                                </ul>

                                 <ul class="dropdown-menu">
                                        <li><a style="color:green" href="{{route('markRead')}}">Mark All as Read</a></li>
                                        <!--admin must be an authenticated user-->
                                    @foreach(auth()->user()->unreadNotifications as $notification)

                                <li style="background-color: lightgray"><a href="{{route('admin.newProposals')}}">{{$notification->data['data']}} </a></li>    

                                    @endforeach

                                     @foreach(auth()->user()->readNotifications as $notification)

                                <li><a href="{{route('admin.newProposals')}}">{{$notification->data['data']}} </a></li>    

                                    @endforeach
                                    
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">

            <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>

        @yield('content')

        @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

   

</body>
</html>
