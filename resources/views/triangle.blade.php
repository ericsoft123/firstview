<!doctype html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Project Test</title>

<!--<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>-->
 
    
<link rel="stylesheet" href="{{URL('css/bootstrap.min.css')}}">

<!---->
<!-- Material Design Bootstrap -->
<link href="{{URL('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{URL('css/style.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{URL('css/animate.css')}}">
    
    <link href="{{URL('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <!--<link href="{{URL('css/datepicker3.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="c{{URL('ss/survey.css')}}">-->
    <!-- JQuery -->
    <script type="text/javascript" src="{{URL('js/jquery-3.1.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/jquery.typedtext.js')}}"></script>
    <!-- Data picker -->
   <script src="{{URL('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{URL('js/typeahead.min.js')}}"></script>
    
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{URL('js/tether.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
  <!--  <script type="text/javascript" src="{{URL('js/mdb.min.js')}}"></script>-->
     
<!---->
 <script src="{{ asset('js/app.js') }}"></script>
<!---->
<script src="{{url('js/jsajax.js')}}"></script>


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
                        {{ config('app.name', 'Laravel') }}
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
  <div class="container test1"><!---div container start-->

    <!-- this is to center column in bootstrap using class="col-xs-1" align="center" -->
    	<!--<div class="col-xs-1 " align="center"><!--class col-xs-1" align="center" start-->
    	<div class="row">
    	
    	<div class="col-md-3">
    		
    	</div>
    	<div class="col-md-6 test animated bounceInRight" id="fullform"><!-- Start div that contain full form-->
   			<form class="form-horizontal" method="post"  name="formadd_data" id="formadd_data" >
    {{ csrf_field() }}
    			<div class="well">
    <div class="card-block">

        <!--Header-->
        <div class="text-center">
          
            <h3 class="demo"><i class="fa fa-pencil animated  bounce"></i><span id="demo-1"></span> </h3>
            <hr class="mt-2 mb-2">
        </div>

    
        <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="creator_username" name="creator_username" placeholder="News Title" required>
            <label for="form3" id="labelchange" ></label>
        </div>
        
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="creator_money" name="creator_money" placeholder="News Title" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
           <!-- <input type="text"  class="name tt-query" id="child1_username" name="child1_username" placeholder="child1_username" required>-->
            <input type="text"  class="name tt-query" id="child1_email" name="child1_email" placeholder="child2_email" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <!--<input type="text"  class="name tt-query" id="child2_username" name="child2_username" placeholder="News Title" required>-->
             <input type="text"  class="name tt-query" id="child2_email" name="child2_email" placeholder="child2_email" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="child1_money" name="child1_money" placeholder="News Title" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="child2_money" name="child2_money" placeholder="child2_money" required>
            <label for="form3" id="labelchange" ></label>
        </div> <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="creator_values" name="creator_values" placeholder="creator_values" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="child1_values" name="child1_values" placeholder="child1_values" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="child2_values" name="child2_values" placeholder="News Title" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="sponsor1_username" name="sponsor1_username" placeholder="sponsor1_username" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="sponsor2_username" name="sponsor2_username" placeholder="sponsor2_username" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="sponsor_money" name="sponsor_money" placeholder="sponsor_money" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="country_manager" name="country_manager" placeholder="country_manager" required>
            <label for="form3" id="labelchange" ></label>
        </div>
         <div class="md-form">
            <i class="fa fa-comment prefix"></i>
            <input type="text"  class="name tt-query" id="triangle_status" name="triangle_status" placeholder="triangle_status" required>
            <label for="form3" id="labelchange" ></label>
        </div>
       
        
        
         
         
       
     
     
          
        
            <input type="text" id="reporter_email" name="reporter_email" class="form-control" value="">
          
           

        <div class="text-center">
            <button class="btn btn-deep-orange"  id="send" name="send">Send</button>
        </div>

    </div>
</div>
    	</div>
    	</form>
		</div><!-- Start div that contain full form-->
    <p><a class="btn btn-primary btn-lg" href="#" role="button" id="start">Resend email password</a>
<div class="container">

	
	
<!--<input type="submit" id="testi" value="submit"/>-->

<!--new table -->
<div class="table-responsive" id="tabledata" >
 
    
 <!-- table data that come from projectcontroller.php-->   
    
</div>
<!--new table -->



</div>



</div>

</body>
</html>



