<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'crm') }}</title>

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
     <link rel="stylesheet" href="{{URL('build/css/intlTelInput.css')}}">
    <!-- customer code-->
<link rel="stylesheet" href="{{URL('css/mystyle.css')}}">
  <link rel="stylesheet" href="{{URL('css/bootstrap.css')}}">
      
  
   <link rel="stylesheet" href="{{URL('css/sweetalert.css')}}">
   
   
  
   <script src="{{ asset('js/app.js') }}"></script>
   
  
    <!-- customer code -->
     <link rel="stylesheet" href="{{URL('css/profile.css')}}">
     
    
<link rel="stylesheet" type="text/css" href="{{URL('css/site_global.css?crc=443350757')}}"/>
 <link rel="stylesheet" href="{{URL('css/index.css?crc=134750879')}}">
 
 
 <link rel="stylesheet" href="{{URL('css/alert/jquery-confirm.min.css')}}">
<script src="{{url('js/alert/jquery-confirm.min.js')}}"></script>
  <style>
	  #loading{
		  top:50%;
	  }
	
	</style>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                   crm
                        <!--{{ config('app.name', 'Supabitcoin') }}-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            
                        @else
                          
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                 Welcome {{ Auth::user()->name }} <span class="caret"></span>
                                 <input type="hidden" value="{{ Auth::user()->name }}" id="accname">
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                            <!--profile settings-->
                            <!--button------------------------------------------------------->
                            <form class="navbar-form navbar-left" role="search" id="formsuper">
        <div class="form-group">
         <input type="hidden" class="form-control" placeholder="Search" id="super_username" name="super_username" value="{{ Auth::user()->username}}">
        </div>
        <button type="submit" class="btn btn-danger" id="view_supertriangle">View My super Triangle</button>
      </form>
                             <button type="submit" class="btn btn-primary" id="view_sbv">View SBV</button>
                            
                            <!--button------------------------------------------------------------>
                             <li><a href="#" data-toggle="modal" data-target="#myModal">Edit This Profile</a></li>
                           
                            <!--profile settings-->
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{url('js/sweetalert.min.js')}}"></script>
  <script src="{{url('js/jquery.js')}}"></script>
  <!--This is for input flag for phone number-->
   <script src="{{url('build/js/intlTelInput.js')}}"></script>
   <!--This is for input flag for phone number-->

<script src="{{url('js/jsajax.js')}}"></script>
<script src="{{url('js/profile.js')}}"></script>
    
</body>
</html>
