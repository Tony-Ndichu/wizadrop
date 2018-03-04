<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/crop.js')}}"></script>
           <script type="text/javascript" src="{{asset('js/exif.js')}}"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

         <link rel="stylesheet" href="{{asset('css/dress.css')}}">
         <link rel="stylesheet" href="{{asset('css/chatterstyle.css')}}">
         <link rel="stylesheet" href="{{asset('css/chat.css')}}">
          <link rel="stylesheet" href="{{asset('css/crop.css')}}">
<meta property="og:title" content="Show your skills. Show what you love to do." >
<meta property="og:description" content="We value all skills, big or small. Create an account and show the world what it is you love to do.">
<meta property="og:image" content="laugh2.jpg">
<meta property="og:url" content="http://www.wizadrop.com">
<meta name="description" content="We value all skills, big or small. Create an account and show the world what it is you love to do." />
<link rel="icon" type="image/png" href="{{asset('images/icon.ico')}}">


        

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

                  <div class="boxlinks">
                                <a href="{{ route('skills') }}"><div class="lilbox" ><i class="fas fa-home" id="icon" ></i></div></a>
                                <a href="{{ route('search1') }}"><div class="lilbox" ><i class="fas fa-search" id="icon"></i></div></a>
                                <a href="{{ route('portfolio') }}"><div class="lilbox" ><i class="fas fa-user" id="icon"></i></div></a>
                                <a href="{{ route('more') }}"><div class="lilbox" ><i class="fas fa-bars" id="icon"></i></div></a>
<a href="{{ route('messagepage') }}">
    <i class="fa fa-envelope fa-lg" id="env" aria-hidden="true" style="font-size:18px;color:#3ccfcf" ></i>
    <span class="label label-pill label-danger count" style="border-radius:10px;" id="num" ></span>
</a>


                        @if(Auth::user()->Profileimage == 0) 
    <img class="dp7"  src="{{asset('profilepics/images.png')}}" width="100%" height="auto" />
@else
  <img class="dp7" src="{{ asset('profilepics/'.Auth::user()->Profileimage) }}" width="100%" height="auto"  />
@endif

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


     <footer id="footer">
                            <div id="boxlinksf">
                                <a href="{{action('PostController@edit') }}"><div class="lilboxp"><i class="fas fa-cog "></i></div></a>
                                <a href="{{route('pictures') }}"><div class="lilboxp"><i class="fas fa-plus-square "></i></div></a>
                            </div>
                        </footer>

    <!-- Scripts -->
             <script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script>

</body>


<script>

    function load_unseen_notification()

{

 $.ajax({

  url:"{{ route('messageno') }}",

  method:"get",

  dataType:"json",

  success:function(response)

  {
    if ((response['response'])>1){
    
    $('.count').html(response['response']);
  }
  
   }

  

 });

}

load_unseen_notification();

setInterval(function(){

 load_unseen_notification();
 
 

}, 2000);

</script>


</html>
