<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
         <link rel="stylesheet" href="{{asset('css/dress.css')}}">
        

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="position:fixed; width:100%; background-color:white; border-bottom-style:solid; border-bottom-color:white; box-shadow: 0 0.3125rem 1rem 0 rgba(0,0,0,0.24);" >
            <div class="container">
                <div class="navbar-header">


                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" id="loginregbutton" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div id="brand">
    <img src="{{ URL::to('/images/wiza.svg') }}"  id="svg2">
        </div>

        

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="padding: 0%">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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

     

    </div>
    <div class="content">
       @yield('content')
   </div>

    <!-- Scripts -->
             <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
