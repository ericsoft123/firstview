<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">
	<title>NTI</title>
	
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css ../assets/css/app.min.css -->

	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	
	<link href="{{URL('css/dataTables/datatables.min.css')}}" rel="stylesheet">
		 <link rel="stylesheet" href="css/countercss/soon.css" type="text/css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="{{URL('css/sweetalert.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
	<!-- build:js ../assets/js/core.min.js -->
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	
	
	
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
  
  <!-- navbar header -->
  <div class="navbar-header">
    <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
      <span class="sr-only">Toggle navigation</span>
      <span class="hamburger-box"><span class="hamburger-inner"></span></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-more"></span>
    </button>

    <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="zmdi zmdi-hc-lg zmdi-search"></span>
    </button>

    <a href="index.html" class="navbar-brand">
      <span class="brand-icon"></span>
      <span class="brand-name"></span>
    </a>
  </div><!-- .navbar-header -->
  
  <div class="navbar-container container-fluid">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
        <li class="hidden-float hidden-menubar-top">
          <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
          </a>
        </li>
        <li>
          <h5 class="page-title hidden-menubar-top hidden-float">Dashboard</h5>
        </li>
      </ul>

      <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
       

        <li class="dropdown">
          <a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
          
        </li>

       

        
      </ul>
    </div>
  </div><!-- navbar-container -->
</nav>
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <a href="javascript:void(0)"><img class="img-responsive" src="assets/images/221.jpg" alt="avatar"/></a>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <h5><a href="javascript:void(0)" class="username">Hi {{Auth::user()->username}}</a></h5>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>User</small>
                <span class="caret"></span>
              </a>
              
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
       
        <li class="has-submenu" style="display: none;" id="admin_menu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Admin</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="#allocate" onClick="return allocate()"><span class="menu-text">allocate</span></a></li>
            <li><a href="#users_table" onClick="return users()"><span class="menu-text">users table</span></a></li>
           
            <li><a href="#View_all" onClick="return admin_all()"><span class="menu-text">view all</span></a></li>
          </ul>
        </li>
        
        <li class="menu-separator"><hr></li>
    <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Profile</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="#edit_profile" onClick="return edit_profile()"><span class="menu-text">Edit Profile</span></a></li>
            
          </ul>
        </li>
        
        <li class="menu-separator"><hr></li>
    <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Invest</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
            <li><a href="#rand_invest" onClick="return rand_invest()"><span class="menu-text">Rand</span></a></li>
            <li><a href="#btc_invest" onClick="btc_invest()"><span class="menu-text">Bitc</span></a></li>
               
                
            
          </ul>
        </li>
     

       

        <li class="menu-separator"><hr></li>

         <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">payment</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
           <li><a href="#rand_tables" onClick="return rand_tables()"><span class="menu-text">Rand</span></a></li>
            <li><a href="#btc_tables" onClick="btc_tables()"><span class="menu-text">btc</span></a></li>
             
            
          </ul>
        </li>

    
    <!--withdraw--->
    
     <li class="menu-separator"><hr></li>

         <li class="has-submenu">
          <a href="javascript:void(0)" class="submenu-toggle">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Withdraw</span>
            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
          </a>
          <ul class="submenu">
           <li><a href="#rand_tables" onClick="return rand_withdraw()"><span class="menu-text">Rand</span></a></li>
            <li><a href="#btc_tables" onClick="btc_withdraw()"><span class="menu-text">btc</span></a></li>
            
            
          </ul>
        </li>
    
    <!--withdraw--->
    
     
        
       
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>
<!--========== END app aside -->

<!-- navbar search -->
<div id="navbar-search" class="navbar-search collapse">
  <div class="navbar-search-inner">
    <form action="#">
      <span class="search-icon"><i class="fa fa-search"></i></span>
      <input class="search-field" type="search" placeholder="search..."/>
    </form>
    <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
      <i class="fa fa-close"></i>
    </button>
  </div>
  <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div><!-- .navbar-search -->



<form id="confirm">
   <!--submit_invest form-->
    {{ csrf_field() }}
<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" id="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                           
                                          
                                            <h4 class="font-bold" style="color: firebrick">Are you sure you receive payment?</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                                    <div class="form-group"><label>username</label> <input type="email" placeholder="Enter your email" class="form-control" id="user_approve" name="user_approve">
                                                    <!--this is button status ;when any user will be banned the button status it will change to Request allocation and it will help us to know status of this users-->
                                                    <input type="hidden" placeholder="Enter your email"  id="user_approvestatus" name="user_approvestatus">
                                                    
                                                    <!--this is amount that are pending then users want to request admin to allocate him users-->
                                                    <input type="hidden" placeholder="Enter your email"  id="user_approveamount" name="user_approveamount">
                                                    
                                                    <!--this is amount that are pending then users want to request admin to allocate him users-->
                                                    <input type="hidden" placeholder="Enter your email"  id="user_approvetype" name="user_approvetype">
                                                    
                                                    <input type="hidden" placeholder="Enter your email"  id="user_approveid" name="user_approveid">
                                                    
                                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" id="randconfirm" >Confirm</button>
                                            <button type="button" class="btn btn-primary" id="btcconfirm" >btc Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
	</form>
                            <!--modal confirm-->


<!---start line of submit investment-->
	
<form id="submit_invest">
  {{ csrf_field() }}


<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">


 			<!---content of  That will not change as welcome content-->

<div class="wrap" >
<!--invest money and Interest-->
	<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-primary"><span class="counter" >R</span><span id="invest_money" class="counter" >0</span></h3>
							<small class="text-color">Rand Invest</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
					</div>
					<footer class="widget-footer bg-primary">
						<small>50% Interest</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-danger"><span class="counter" >R</span><span id="display_money" class="counter" >0</span></h3>
							<small class="text-color">Current Balance</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
					</div>
					<footer class="widget-footer bg-danger">
						<small>5% daily grow</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-success"><span class="counter" >btc</span><span id="btcinvest_money" class="counter" >0</span></h3>
							<small class="text-color">BTC Invest</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<footer class="widget-footer bg-success">
						<small>100% Interest</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="widget stats-widget">
					<div class="widget-body clearfix">
						<div class="pull-left">
							<h3 class="widget-title text-warning"><span class="counter" >btc</span><span id="btcdisplay_money" class="counter" >0</span></h3>
							<small class="text-color">Current Balance</small>
						</div>
						<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
					</div>
					<footer class="widget-footer bg-warning">
						<small>10% daily grow</small>
						<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
					</footer>
				</div><!-- .widget -->
			</div>
		</div><!-- .row -->

<!--invest Money and Interest-->


	<section class="app-content" id="welcome">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h1 class="text-center" style="color: goldenrod">Welcome to our Neutral investment company</h1>
						<hr>
						<div class="col-sm-4">
							
					</div><!-- .row -->
						<div class="col-sm-4">
						<h1></h1>
							<p class="justify" style="color:darkgreen;font-size:25px;">Next Step: Choose The Investment Option:</p>
							<p  class="justify" style="color:darkgreen;font-size:25px;">Rand or Bitcoin</p>
							<p class="justify" style="color:darkgreen;font-size:25px;">For All Payments Options please Refere to </p>
							<p class="justify" style="color:darkgreen;font-size:25px;">your Investment Option Menu</p>
					</div><!-- .row -->
					<div class="col-sm-4">
							
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>


 			
 			<!---content of  That will not change as welcome content-->



<!--edit table-->
<div class="wrap" style="display: none"id="profile_edit">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>Edit Profile</h4>
						<hr>
						<div class="col-sm-4">
							<!--empty-->
						</div><!-- .col -->
						<div class="col-sm-4">
						
						 <!---content of edit form--->
 			<!-- <div class="soon" id="my-soon-counter"
     data-due="2016-12-02 08:34:00Z"
     data-now="2016-12-02 08:20:30Z"
     data-layout="group"
     data-format="d,h,m,s"
     data-face="slot">
    
</div>-->
 			<h3 class="text-center">update your Profile</h3>
    	   
    
    	
                     <input type="hidden" name="user_username" id="user_username" value="{{Auth::user()->username}}">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Name</label>
                           
                       <input type="text" name="user_name" id="user_name" class="form-control" >
                       
			</div>
                      
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">email</label>
                       
                        <input type="text" name="user_email" id="user_email" class="form-control" >
                        
			</div>
                      
                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Password</label>
                       
                        <input type="text" name="user_password" id="user_password" class="form-control" >
                        
			</div>
                      
                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">cell</label>
                        
                         <input type="text" name="user_cell" id="user_cell" class="form-control" >
			</div>
                         
                       
                            
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Bank Name</label>
                            

                            
                                <input id="bank_name1" type="text" class="form-control" name="bank_name1" value="{{ old('bank_name') }}" required autofocus placeholder="Bank Name*">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                         <div class="form-group{{ $errors->has('branch_number') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Branch Number</label>
                            
                                <input id="branch_number1" type="text" class="form-control" name="branch_number1" value="{{ old('branch_number') }}" required autofocus placeholder="Branch Number*">

                                @if ($errors->has('branch_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_number') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                      

                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Account Number</label>
                            

                            
                                <input id="account_number1" type="text" class="form-control" name="account_number1" required placeholder="Account number*">

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                           <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Bitcoin Address</label>
                            

                            
                                <input id="bitcoinaddress" type="text" class="form-control" name="bitcoinaddress" required placeholder="Account number*">

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                           <!---->
                            
                             <div class="col-md-offset-5 col-sm-4 col-sm-offset-5">   <div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn  btn-danger" id="update_profile"><i class="fa fa-check"></i>submit</button></div>
    	<!---->
 			
 			<!---content of edit profile-->

							
						</div><!-- .col -->
						<div class="col-sm-4">
						<!--empty-->
						</div>
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>

<!--edit table -->




 <!---rand-->
  <div class="wrap" id="randinvest_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>Rand invest</h4>
						<hr>
						<div class="col-sm-4">
						<!--empty-->
						</div><!-- .col -->
						<div class="col-sm-4">
						
						  <h4 class="text-center" id="randmessage_hide" style="display:none"></h4>
          <!--content1-->
           
			
            <div class="col-md-offset-5 col-sm-4 col-sm-offset-5" id="randgethelp_hide" style="display: none">   <div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn  btn-danger" id="payme"><i class="fa fa-check"></i>Withdraw</button></div>
            
            
            </div>
						
						
							<!---content of bank details--->
			<div id="provide_helprand">
 			
    	   
    
    	 
                       
                         
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           
                           
                           
                           <label for="email" class="control-label">Amount</label>
                            

                            
                                <input  type="text" class="form-control" name="amount" id="amount" value="{{ old('bank_name') }}" required autofocus placeholder="R500 -R1000 000*">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Total Amount</label>
                            

                            
                                <input id="total_amount" type="text" class="form-control" name="total_amount" value="{{ old('bank_name') }}" required autofocus placeholder="Bank Name*">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                            
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Bank Name</label>
                            

                            
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" required autofocus placeholder="Bank Name*">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                         <div class="form-group{{ $errors->has('branch_number') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Branch Number</label>
                            
                                <input id="branch_number" type="text" class="form-control" name="branch_number" value="{{ old('branch_number') }}" required autofocus placeholder="Branch Number*">

                                @if ($errors->has('branch_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('branch_number') }}</strong>
                                    </span>
                                @endif
                          
                        </div>
                      

                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Account Number</label>
                            

                            
                                <input id="account_number" type="text" class="form-control" name="account_number" required placeholder="Account number*">

                                @if ($errors->has('account_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                             <div class="col-md-offset-5 col-sm-4 col-sm-offset-5">   <div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn  btn-danger" id="asktopay"><i class="fa fa-check"></i>Submit</button></div></div>
                           <!---->
						</div><!-- .col -->
						<div class="col-sm-4">
							<!--empty-->
						</div>
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div><!-- .wrap -->
 <!---rand-->
 
 <!--rand table-->
 <div class="wrap" id="randtables_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>Rand Table</h4>
						<hr>
					
					<!--table content-->
         
         
         <!----get user who will pay me-->
			<div id="whopayme_hide" style="display:none">
 	 <h3 class="text-center">List of Members That Will Pay Me</h3>
  	 <table  class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Cell</th>
            <th>email</th>
            <th>Amount</th>
            <th>Bank Name</th>
            <th>Account Number</th>
             <th>Branch Code</th>
             <th>time</th>
             <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	
    	<?php
		//whopayme
		//script
		
		$username=auth::user()->username;
			//just here i am puting some security in backend
		//$checkuser=DB::select("select *from users where username='$username' and platform='payme'");
			//if($checkuser){
				///then print the lists of the person who will pay him from allocates tables
				$userpayme=DB::select("select *from allocates where user_asktogetpaid='$username' and allocate_status='notpaid' and user_asktogetpaidamount>0 and invest_type='none'");
			$today1 = date("Y-m-d H:i:s"); 
			foreach($userpayme as $users){
				
				?>
				
				                      <tr>
										<td><?php echo $users->id; ?></td>
	 
			
										<td><?php echo $users->user_asktopayname; ?></td>
										<td><?php echo $users->user_asktopaycell; ?></td>
										<td><?php echo $users->user_asktopayemail; ?></td>
										<td><?php echo $users->user_asktopayamount; ?></td>
										<td><?php echo $users->user_asktopaybankname; ?></td>
										<td><?php echo $users->user_asktopayaccountnumber; ?></td>
										<td><?php echo $users->user_asktopaybranchcode; ?></td>
										
										<td class="soon" id="my-soon-counter" data-due="<?php echo $users->updated_at ;?>" data-now="<?php  echo $today1 ;?>"  data-layout="group" data-format="d,h,m,s"  data-face="slot" style="color: red;font-size:16px;"></td>
										<td><a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal" onclick="return approve('<?php echo $users->id; ?>')"><?php echo $users->button_status; ?></a></td>
									</tr>
				
				<?php
					
					
			}
			
				
		
		//script
		
		
		?>
    	
    </tbody>
  </table>
  </div>
    <!----get user who will pay me-->
  
  
   <!----get user whom i will pay -->
  <div id="whoipay_hide" style="display:none">
 	 <h3 class="text-center">List of Members That I will Pay</h3>
  	 <table  class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Cell</th>
            <th>email</th>
             <th>Amount</th>
            <th>Bank Name</th>
            <th>Account Number</th>
             <th>Branch Code</th>
             <th>Time</th>
        </tr>
    </thead>
    <tbody>
    	<?php
		///script
		
		$username=auth::user()->username;
			//just here i am puting some security in backend
		//$checkuser=DB::select("select *from users where username='$username' and platform='payme'");
			//if($checkuser){
				///then print the lists of the person who will pay him from allocates tables
				$userpayme=DB::select("select *from allocates where user_asktopay='$username' and allocate_status='notpaid' and user_asktopayamount>0 and invest_type='none'");
			$today1 = date("Y-m-d H:i:s"); 
			foreach($userpayme as $users){
				
				?>
				
				                      <tr>
										<td><?php echo $users->id; ?></td>
	 
			
										<td><?php echo $users->user_asktogetpaidname; ?></td>
										<td><?php echo $users->user_asktogetpaidcell; ?></td>
										<td><?php echo $users->user_asktogetpaidemail; ?></td>
										<td><?php echo $users->user_asktogetpaidamount; ?></td>
										<td><?php echo $users->user_asktogetpaidbankname; ?></td>
										<td><?php echo $users->user_asktogetpaidaccountnumber; ?></td>
										<td><?php echo $users->user_asktogetpaidbranchcode; ?></td>
										
										<td class="soon" id="my-soon-counter" data-due="<?php echo $users->updated_at ;?>" data-now="<?php  echo $today1 ;?>"  data-layout="group" data-format="d,h,m,s"  data-face="slot" style="color: red;font-size:16px;"></td>
										
									</tr>
				
				<?php
					
					
			}
		
		///
		
		?>
    	
    </tbody>
  </table>
  </div>
    <!----get user whom i will pay -->
    
         
         
         <!--table content-->
          
					
						
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>
 
 <!--rand table -->
 
 <!---bitcoin----->
 
 <div class="wrap" id="btcinvest_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>Bitcoin</h4>
						<hr>
						<div class="col-sm-4">
							<!--empty-->
							
						</div><!-- .col -->
						<div class="col-sm-4">
							<!--table content-->
          
          <h4 class="text-center" id="btcmessage_hide" ></h4>
          
          
          
           <div class="col-md-offset-5 col-sm-4 col-sm-offset-5" id="btcgethelp_hide" style="display:none;">   <div class="mbr-buttons mbr-buttons--center"><button type="submit" class="mbr-buttons__btn btn  btn-danger" id="btcpayme"><i class="fa fa-check"></i>Withdraw</button></div>
            
            
            </div>
      
           
         <div  > 
 			<!---content of bank details--->
 			
 			<!--get help -->
 			
			 <div  id="gethelp_hide">
			 	
			 	
			 	<!--<p class="text-center">Get Help</p>-->
			 	
			 	
			 	
			 </div>
			 
			 <!--get help -->
 			<div id="providehelp_hide">
 			
    	
                 
                          
                          <div class="form-group">
                            <label for="email" class="control-label">BTC I want to Invest </label>

                            
                              <input type="text" name="btc" id="btc" class="form-control" placeholder="0,01BTC-1BTC">
                            
                        </div>
                          <div class="form-group">
                            <label for="email" class="control-label">Total BTC That i will get</label>

                            
                              <input type="text" name="btc_total" id="btc_total" class="form-control">
                            
                        </div>
                           
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                           <label for="email" class="control-label">Bitcoin Address</label>
                            

                            
                                <input id="btc_address" type="text" class="form-control" name="btc_address" value="{{ old('bank_name') }}" required autofocus placeholder="Enter Bitcoin Address*">

                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                         
                            
                           <!---->
                            
                             <div class="col-md-offset-4 col-sm-4 col-sm-offset-4"> <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn  btn-danger" id="btcasktopay"><i class="fa fa-check"></i>save</button></div></div>
                             </div>
                             <!--provide help content-->
                             
		  </div>
						</div><!-- .col -->
						<div class="col-sm-4">
						<!--empty-->
						</div>
					</div><!-- .row -->
					<div class="m-t-lg">
						
					</div>
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>
 
 
 <!----bitcoin--->
 
 <!--bitcoin table-->
 <div class="wrap" id="btctables_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>bitcoin table</h4>
						<hr>
					 	<!--table content -->
         
         
          <!----Bitcoin get user who will pay me-->
 
    <!---- Bitcoin get user who will pay me-->
    
    <div id="btcwhopayme_hide" style="display:none">
 	 <h3 class="text-center ">List of BTC Members Who Will Pay Me</h3>
  	 <table  class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Cell</th>
            <th>email</th>
             <th>Amount</th>
           <th>BTC Address</th>
            <th>Time</th>
             <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php
		///btc_payme
		//script
		
		$username=auth::user()->username;
			//just here i am puting some security in backend
		//$checkuser=DB::select("select *from users where username='$username' and platform='payme'");
			//if($checkuser){
				///then print the lists of the person who will pay him from allocates tables
				$userpayme=DB::select("select *from allocates where user_asktogetpaid='$username' and allocate_status='notpaid' and user_asktogetpaidamount>0 and invest_type='btc'");
			$today1 = date("Y-m-d H:i:s"); 
			foreach($userpayme as $users){
				
				?>
				
				                      <tr>
										<td><?php echo $users->id; ?></td>
	 
			
										<td><?php echo $users->user_asktopayname; ?></td>
										<td><?php echo $users->user_asktopaycell; ?></td>
										<td><?php echo $users->user_asktopayemail; ?></td>
										<td><?php echo $users->user_asktopayamount; ?></td>
										<td><?php echo $users->user_asktogetpaidbtcaddress; ?></td>
										
										
										<td class="soon" id="my-soon-counter" data-due="<?php echo $users->updated_at ;?>" data-now="<?php  echo $today1 ;?>"  data-layout="group" data-format="d,h,m,s"  data-face="slot" style="color: red;font-size:16px;"></td>
										<td><a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal" onclick="return approve('<?php echo $users->id; ?>')"><?php echo $users->button_status; ?></a></td>
									</tr>
				
				<?php
					
			
			}
		
		///
		
		?>
    	
    	
    </tbody>
  </table>
  </div>
    <!----Bitcoin get user whom i will pay-->
  <div id="btcwhoipay_hide" style="display:none">
 	 	 <h3 class="text-center">List of BTC Members Whom i Will Pay </h3>
  	 <table   class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Cell</th>
            <th>email</th>
             <th>Amount</th>
           <th>BTC Address</th>
             
             <th>Time</th>
        </tr>
    </thead>
    <tbody>
    	<?php
		///script
		
		$username=auth::user()->username;
			//just here i am puting some security in backend
		//$checkuser=DB::select("select *from users where username='$username' and platform='payme'");
			//if($checkuser){
				///then print the lists of the person who will pay him from allocates tables
				$userpayme=DB::select("select *from allocates where user_asktopay='$username' and allocate_status='notpaid' and user_asktopayamount>0 and invest_type='btc'");
			$today1 = date("Y-m-d H:i:s"); 
			foreach($userpayme as $users){
				
				?>
				
				                      <tr>
										<td><?php echo $users->id; ?></td>
	 
			
										<td><?php echo $users->user_asktogetpaidname; ?></td>
										<td><?php echo $users->user_asktogetpaidcell; ?></td>
										<td><?php echo $users->user_asktogetpaidemail; ?></td>
										<td><?php echo $users->user_asktogetpaidamount; ?></td>
										<td><?php echo $users->user_asktogetpaidbankname; ?></td>
										<td><?php echo $users->user_asktogetpaidaccountnumber; ?></td>
										<td><?php echo $users->user_asktogetpaidbranchcode; ?></td>
										
										<td class="soon" id="my-soon-counter" data-due="<?php echo $users->updated_at ;?>" data-now="<?php  echo $today1 ;?>"  data-layout="group" data-format="d,h,m,s"  data-face="slot" style="color: red;font-size:16px;"></td>
										
									</tr>
				
				<?php
					
					
			}
		
		///
		
		?>
    	
    	
    </tbody>
  </table>
  </div>
    <!----Bitcoin get user whom i will pay-->
          
          <!--table content-->
						
					
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>
 
 <!--bitcoin table-->
 
 

			
			<!--admin  users table--->
			<div class="wrap" id="adminusers_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<!-- DOM dataTable -->
			<div class="col-md-12">
				<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Admin users tables</h4>
					</header><!-- .widget-header -->
					<hr class="widget-separator">
					<div class="widget-body">
					<!--create admin users-->
					
					<div id="admincreateuser_hide" style="display: none">
    	
    	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                     <label for="email" class="control-label">Admin username</label>
    			<input type="text" id="admin_username" name="admin_username" class="form-control">
    		</div>
    		
    		
    		
    		<input type="submit" class="btn btn-success" id="create_adminuser" name="create_adminuser" value="Create user">
    	</div>
					<!---create admin users-->
					<!---users table--->
						<div class="table-responsive" >
							<table id="users"  class="table table-striped" cellspacing="0" width="100%">
								 <thead>
        <tr>
            <th>Id</th>
            <th>username</th>
            <th>Name</th>
            <th>email</th>
            <th>Password</th>
            <th>Cell</th>
            <th>Bank Name</th>
            <th>Account Number</th>
            <th>Branch Code</th>
            <th>Bitcoin Address</th>
            
        </tr>
    </thead>
								
								
							</table>
						</div>
						<!---users table--->
						
						
						
					</div><!-- .widget-body -->
				</div><!-- .widget -->
			</div><!-- END column -->
			
			<!--admin users table-->
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>
 
 <!--admin  users table--->

 
 <!--allocate table-->
 <div class="wrap"  id="adminallocate_hide" style="display:none">
	<section class="app-content">
		<div class="row">
			<div class="col-md-12">
				<div class="widget p-lg">
					<div class="row no-gutter">
						<h4>allocate</h4>
						<hr>
					 <!---allocation table--->


  <div class="row">
     <p>title of table</p>
 <div class="form-group" >
                            <label for="email" class="control-label">choose allocation method</label>

                            <select class="form-control" id="choosealloc">
                            <option>automatic</option>
                              <option>admin</option>
                            	<option>reallocation</option>
                            	
                            <!--	<option>manual</option>-->
                            	
                            	<option>bitcoin automatic</option>
                            	<option>bitcoin admin</option>
                            	<option>bitcoin reallocation</option>
                            	<!--<option>bitcoin manual</option>-->
                            </select>
                                
                          
                        </div> 
   
   
    <div class="col-md-5">
    	<h3> Ask to Pay</h3>
    	 <!---->
    	 
                  <div class="form-group" >
                            <label for="email" class="control-label">Name</label>
<input type="hidden" id="askmetopay_username" name="askmetopay_username">
                           <input type="hidden" id="askmetopay_cell" name="askmetopay_cell">
                           
                           <input type="hidden" id="askmetopay_email" name="askmetopay_email">
                            <input type="hidden" id="askmetopay_invtype" name="askmetopay_invtype">
                            <input type="text" id="askmetopay_name" name="askmetopay_name" readonly class="form-control">
                               
                               <input type="hidden" id="askmetopay_amount1" name="askmetopay_amount1" class="form-control">
                                
                          
                        </div> 
                        
                         <div class="form-group" >
                            <label for="email" class="control-label">Amount</label>

                            <input type="text" id="askmetopay_amount" name="askmetopay_amount" readonly class="form-control">
                                
                          
                        </div> 
                        
                        
                        
                          <table id="table_asktopay" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    
  </table>
    	 
    	 <!---->
    </div>
    <div class="col-md-2">
    	
    	<div class="form-group" >
                            

                            <input type="submit" class="btn btn-success" id="allocate" name="allocate" value="allocate">
                               
                             
                                
                          
                        </div> 
    </div>
    <div class="col-md-5">
    	<h3>Pay Me</h3>
    	 <!---->
    	 
                  <div class="form-group" >
                            <label for="email" class="control-label">Name</label>
<input type="hidden" id="payme_username" name="payme_username">
                           
                           <input type="hidden" id="payme_email" name="payme_email">
                           <input type="hidden" id="payme_cell" name="payme_cell">
                            <input type="hidden" id="payme_bankname" name="payme_bankname">
                             <input type="hidden" id="payme_banknumber" name="payme_banknumber">
                              <input type="hidden" id="payme_accountnumber" name="payme_accountnumber">
                            <input type="hidden" id="payme_btcaddress" name="payme_btcaddress">
                             <input type="hidden" id="payme_type" name="payme_type" value="none">
                            <input type="hidden" id="payme_amount1" name="payme_amount1">
                           
                           
                            <input type="text" id="payme_name" name="payme_name" class="form-control">
                                
                          
                        </div> 
                        
                         <div class="form-group" >
                            <label for="email" class="control-label">Amount</label>

                            <input type="text" id="payme_amount" name="payme_amount" class="form-control">
                                
                          
                        </div> 
                        
                        
                        
                          <table id="table_payme" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Amount</th>
             <th>Action</th>
           
        </tr>
    </thead>
  </table>
    	 
    	 <!---->
    </div>
</div>
  <!---allocation table--->	
						
					
					</div><!-- .row -->
					
				</div><!-- .widget -->
			</div><!-- END column -->

			
			
		</div><!-- .row -->
	</section><!-- .app-content -->
</div>
 
 <!--allocate-->
<!---end line of submit investment-->
	</form>

  <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <footer class="app-footer">
      <div class="clearfix">
        <ul class="footer-menu pull-right">
          <li><a href="javascript:void(0)">Careers</a></li>
          <li><a href="javascript:void(0)">Privacy Policy</a></li>
          <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
        </ul>
        <div class="copyright pull-left">Copyright nti 2017 &copy;</div>
      </div>
    </footer>
  </div>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

	<!-- APP CUSTOMIZER -->
	<!-- #app-customizer -->
	
	
	
	<script src="{{URL('js/dataTables/datatables.min.js')}}"></script>
	
	
	 <script src="{{url('js/sweetalert.min.js')}}"></script>
	  <script src="{{URL('js/profile.js')}}"></script>
	<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
	
	<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
	<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
	<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="libs/bower/PACE/pace.min.js"></script>
	<!-- endbuild -->

	<!-- build:js ../assets/js/app.min.js -->
	<script src="assets/js/library.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/app.js"></script>
	<!-- endbuild -->
	<script src="libs/bower/moment/moment.js"></script>
	<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
	<script src="assets/js/fullcalendar.js"></script>
	 <script type="text/javascript">
	
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	//////////////////////////////////MAIN CONTROLLER FUNCTION/////////////////////////////////////////////////////
		 
	function cronjob()
{
	"use strict";
	$.ajax({
		url:"./cronjob",
		type:"get",
		
		success:function(data){
			
			
		}
	});
}
	
		function btccronjob()
{
	"use strict";
	$.ajax({
		url:"./btccronjob",
		type:"get",
		
		success:function(data){
			
			
		}
	});
}
	
	function request_help(){
		"use strict";
	$.ajax({
		url:"./account",
		type:"get",
		
		success:function(data){
		$('#invest_money').text(data.users[0].rand_invest);
		$('#display_money').text(data.users[0].rand_payme);
		
		}
	});
	}
	function btcrequest_help(){
		"use strict";
	$.ajax({
		url:"./account",
		type:"get",
		
		success:function(data){
		$('#btcinvest_money').text(data.users[0].btc_invest);
		$('#btcdisplay_money').text(data.users[0].btc_payme);
		
		}
	});
	}
	
	function countday()
{
	"use strict";
	$.ajax({
		url:"./countday",
		type:"get",
		
		success:function(data){
		$('#invest_money').text(data.invest);
		$('#display_money').text(data.moneydisplay);
		
		}
	});
}
	
	function btccountday()
{
	$.ajax({
		url:"./btccountday",
		type:"get",
		
		success:function(data){
			$('#btcinvest_money').text(data.invest);
		
		$('#btcdisplay_money').text(data.moneydisplay);
		
		}
	});
}
function account()
{
	//this will give us full multi control application without strugling
"use strict";	
	$.ajax({
		url:"./account",
		type:"get",
		success:function(data){
			//console.log(data.profile);
			console.log(data.users);
			console.log(data.users[0].platform);
			var platform=data.users[0].platform;
			var status=data.users[0].status;
			
			$('#user_name').val(data.users[0].name);
			$('#user_email').val(data.users[0].email);
			$('#user_cell').val(data.users[0].cell);
			$('#user_password').val(data.users[0].password_decode);
			$('#bank_name').val(data.users[0].bank_name);
			$('#account_number').val(data.users[0].account_number);
			$('#branch_number').val(data.users[0].branch_code);
			
			$('#bank_name1').val(data.users[0].bank_name);
			$('#account_number1').val(data.users[0].account_number);
			$('#branch_number1').val(data.users[0].branch_code);
			$('#bitcoinaddress').val(data.users[0].btc_address);
			
			$('#btc_address').val(data.users[0].btc_address);
			//var child_money=data.users[0].child_money;
			if(platform==='none' && status==='none')//new user who are not even doing anything
				{
					///update profile and be able to invest in one platform or both
					//$('#tablecustomer').show();
					//$('#randinvest_hide').show();
					//$('#btcinvest_hide').show();
					cronjob();
					btccronjob();
				}
			else if(platform==='none' && status==='btcasktopay'){//when user asking  to pay
				//here user the user on Rand it will show that he is investing already and he is waiting someone that he must pay
				$('#btcmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#btcwhoipay_hide').show();
				$('#randinvest_hide').show();
				
				
				cronjob();
				btccronjob();
			}
			
		   	else if(platform==='none' && status==='wbtcpayme')
				{
					
					//here user he is waiting  10 days to finish then he can ask to a person to payhim;
				//here on his Rand invest he will see only 10 days counting only;
				//here also i can not use cronjobs based on day difference script customer he will enter on his account then always when he enter in his account system count days and after 10 days when he enter on his system then  platform will update directly to payme anddirectly take 
					
					//he
					
					$('#btcmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#btccounter_hide').show();
					btccountday();
					$('#randinvest_hide').show();
					
					cronjob();
					btccronjob();
					
				}
			else if(platform==='none' && status==='btcpayme'){////user ask to getpaid
				///here user ask  to get paid 
				//here system it will take latest interest then  give to him as new asking pay money
				
				$('#btcwhopayme_hide').show();
				$('#btcgethelp_hide').show();
                $('#btccounter_hide').show();
				btcrequest_help();
				$('#randinvest_hide').show();
				
				cronjob();
				btccronjob();
			}
			
			///
			
			
			else if(platform==='asktopay' && status==='none'){//when user asking  to pay
				//here user the user on Rand it will show that he is investing already and he is waiting someone that he must pay
				///
				$('#btcinvest_hide').show();
			
				///
				
				
				
				////
				
				$('#randmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#whoipay_hide').show();
				
				///
				cronjob();
				btccronjob();
			}
			
		   	else if(platform==='asktopay' && status==='btcasktopay')
				{
					
					//here user he is waiting  10 days to finish then he can ask to a person to payhim;
				//here on his Rand invest he will see only 10 days counting only;
				//here also i can not use cronjobs based on day difference script customer he will enter on his account then always when he enter in his account system count days and after 10 days when he enter on his system then  platform will update directly to payme anddirectly take 
					
					//he
					//
					
					$('#btcmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#btcwhoipay_hide').show();
					
					
					//
					
					
					///
					$('#randmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#whoipay_hide').show();
					
					
					///
				
					
				
				cronjob();
				btccronjob();
					
				}
			else if(platform==='asktopay' && status==='wbtcpayme'){////user ask to getpaid
				///here user ask  to get paid 
				//here system it will take latest interest then  give to him as new asking pay money
				
				////
				$('#btcmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#btccounter_hide').show();
					btccountday();
				
				
				///
				
				
				///
				
				$('#randmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#whoipay_hide').show();
				
				///
				
				cronjob();
				btccronjob();
			}
			
			
			///2
			
			
			
			else if(platform==='asktopay' && status==='btcpayme'){//when user asking  to pay
				//here user the user on Rand it will show that he is investing already and he is waiting someone that he must pay
				
				////
				
				
				$('#btcwhopayme_hide').show();
				$('#btcgethelp_hide').show();
                $('#btccounter_hide').show();
				btcrequest_help();
				
				///
				
				
				///
				
				$('#randmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#whoipay_hide').show();
				
				///
				
				
				cronjob();
				btccronjob();
			}
			
		   	else if(platform==='wpayme' && status==='none')
				{
					
					//here user he is waiting  10 days to finish then he can ask to a person to payhim;
				//here on his Rand invest he will see only 10 days counting only;
				//here also i can not use cronjobs based on day difference script customer he will enter on his account then always when he enter in his account system count days and after 10 days when he enter on his system then  platform will update directly to payme anddirectly take 
					
			///
					$('#btcinvest_hide').show();
					
					///
					
					
					///
					$('#randmessage_hide').show();
					$('#randmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#randcounter_hide').show();
					countday();
					
					///
					
					
					
					cronjob();
					btccronjob();
					
				}
			else if(platform==='wpayme' && status==='btcasktopay'){////user ask to getpaid
				///here user ask  to get paid 
				//here system it will take latest interest then  give to him as new asking pay money
				//
				$('#btcmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#btcwhoipay_hide').show();
				
				
				//
				
				///
					
					$('#randmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#randcounter_hide').show();
					countday();
					
					///
					
			
				cronjob();
				btccronjob();
			}
			
			
			///2
			
			
			///3
			
			
			
			else if(platform==='wpayme' && status==='wbtcpayme'){//when user asking  to pay
				//here user the user on Rand it will show that he is investing already and he is waiting someone that he must pay
				
				///
				
				$('#btcmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#btccounter_hide').show();
					btccountday();
				
				///
				
				///
					
					$('#randmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#randcounter_hide').show();
					countday();
					
					///
					
				
				cronjob();
				btccronjob();
			}
			
		   	else if(platform==='wpayme' && status==='btcpayme')
				{
					
					//here user he is waiting  10 days to finish then he can ask to a person to payhim;
				//here on his Rand invest he will see only 10 days counting only;
				//here also i can not use cronjobs based on day difference script customer he will enter on his account then always when he enter in his account system count days and after 10 days when he enter on his system then  platform will update directly to payme anddirectly take 
					
					//he
					///
					
					$('#btcwhopayme_hide').show();
				$('#btcgethelp_hide').show();
                $('#btccounter_hide').show();
				btcrequest_help();
					
					///
					
					///
					
					$('#randmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#randcounter_hide').show();
					countday();
					
					///
					
					
					cronjob();
					btccronjob();
					
				}
			else if(platform==='asktopay' && status==='btcpayme'){////user ask to getpaid
				///here user ask  to get paid 
				//here system it will take latest interest then  give to him as new asking pay money
				///
				$('#btcwhopayme_hide').show();
				$('#btcgethelp_hide').show();
                $('#btccounter_hide').show();
				btcrequest_help();
				
				
				///
				
				///
				$('#randmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#whoipay_hide').show();
				
				
				///
				
				cronjob();
				btccronjob();
			}
			
			
			///3
			
			
			///4
			
			
			
			else if(platform==='payme' && status==='none'){//when user asking  to pay
				//here user the user on Rand it will show that he is investing already and he is waiting someone that //he must pay
				//
				$('#btcinvest_hide').show();
				//
				
				///
				$('#whopayme_hide').show();
				$('#randgethelp_hide').show();
                $('#randcounter_hide').show();
				request_help();
				//
				cronjob();
				btccronjob();
			}
			
		   	else if(platform==='payme' && status==='btcasktopay')
				{
					
					//here user he is waiting  10 days to finish then he can ask to a person to payhim;
				//here on his Rand invest he will see only 10 days counting only;
				//here also i can not use cronjobs based on day difference script customer he will enter on his account then always when he enter in his account system count days and after 10 days when he enter on his system then  platform will update directly to payme anddirectly take 
					
					//he
					///
					$('#btcmessage_hide').text("make sure that you will pay all the users we will gave you"); //message that will be displayed
				$('#btcwhoipay_hide').show();
					
					//
					
					///
				$('#whopayme_hide').show();
				$('#randgethelp_hide').show();
                $('#randcounter_hide').show();
				request_help();
				//
					
					cronjob();
					btccronjob();
					
				}
			else if(platform==='payme' && status==='wbtcpayme'){////user ask to getpaid
				///here user ask  to get paid 
				//here system it will take latest interest then  give to him as new asking pay money
				///
				$('#btcmessage_hide').text("Wait then after 10 days ask to get paid "); 
					$('#btccounter_hide').show();
					btccountday();
				
				
				///
				 
			///
				$('#whopayme_hide').show();
				$('#randgethelp_hide').show();
                $('#randcounter_hide').show();
				request_help();
				//
				cronjob();
				btccronjob();
			}
			
			
			///4
			
			////
			
			
			
			
			
			
			
			
			
			else if(platform==='payme'&& status==='btcpayme'){
				//it is a time where user get a person who will pay and he will allocate him also
				////
				
				$('#btcwhopayme_hide').show();
				$('#btcgethelp_hide').show();
                $('#btccounter_hide').show();
				btcrequest_help();
				
			
			///
				$('#whopayme_hide').show();
				$('#randgethelp_hide').show();
                $('#randcounter_hide').show();
				request_help();
				//
				btccronjob();
				cronjob();
			}
			
			/*finish condition here let me use first rand for all this operation*/
			
			
			
			
			
			
			//////////////////////user who ask to get paid//////////////
			
			else if(platform==='banned')//when user is banned by our system or admin banned
				{
					alert("we banned you for more information contact admin on info@support.com");
					location.reload();
					cronjob();
					btccronjob();
				}
			else if(platform==='admin')//when user is banned by our system or admin banned
				{
					$('#admin_menu').show();
					//$('#adminallocate_hide').show();
					$('#admincreateuser_hide').show();
					//$('#adminusers_hide').show();
				}
			
			else if(platform==='superchildgrand_activated')
				{
					$('#youwillget').css("font-size","25px");
					$('#supermoneydisplay').css("font-size","25px");
					$('#youwillget').text("Invest  ");
					
						$('#supermoneydisplay').text(" In This Triangle");
					$('#view_supertriangle').click();
				}
			else{
				$('#complete').hide();
				$('#int_wallet').val(data.users[0].internal_wallet);
			}
			
			
		}
	});
	
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function get_asktopay()
{
	"use strict";
	$.ajax({
		url:"./get_asktopay",
		type:"get",
		
		success:function(data){
			//$('#btcconfirm').hide();
			$('#whopayme').html(data);
			
		}
	});
}



/////////////////////////////////////////////////////////////MAIN CONTROLLER////////////////////////////////

	
	/*function get_asktopay(){//is user who will be paid to get persons that they will pay him
		//$.fn.dataTableExt.sErrMode = 'throw';//if there is error 
	
			//
			// $.fn.dataTable.ext.errMode = 'none';
			Table = $('#whopayme').DataTable({
        "processing": true,
        "serverSide": true,
		"destroy":true,
        "ajax": "{{ route('get_asktopay') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_asktopayname', name: 'user_asktopayname'},
            {data: 'user_asktopaycell', name: 'user_asktopaycell'},
            {data: 'user_asktopayemail', name: 'user_asktopayemail'},
			{data: 'user_asktopayamount', name: 'user_asktopayamount'},
			 {data: 'user_asktopaybankname', name: 'user_asktopaybankname'},
			
			{data: 'user_asktopayaccountnumber', name: 'user_asktopayaccountnumber'},
			{data: 'user_asktopaybranchcode', name: 'user_asktopaybranchcode'},
			{data: 'action', name: 'action'}
			
			  
     			  
        ]
    });
	////
		
		$.ajax({
    url: 'js/counterjs/soon.js',
    success:function(){
		
	}
});
		
		///	
		
		
		
	}*/
/*		
	function get_asktopay(){//is user who will be paid to get persons that they will pay him
		//$.fn.dataTableExt.sErrMode = 'throw';//if there is error 
	
			//
			// $.fn.dataTable.ext.errMode = 'none';
			Table = $('#whopayme').DataTable({
        "processing": true,
        "serverSide": true,
		"destroy":true,
        "ajax": "{{ route('get_asktopay') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_asktopayname', name: 'user_asktopayname'},
            {data: 'user_asktopaycell', name: 'user_asktopaycell'},
            {data: 'user_asktopayemail', name: 'user_asktopayemail'},
			{data: 'user_asktopayamount', name: 'user_asktopayamount'},
			 {data: 'user_asktopaybankname', name: 'user_asktopaybankname'},
			
			{data: 'user_asktopayaccountnumber', name: 'user_asktopayaccountnumber'},
			{data: 'user_asktopaybranchcode', name: 'user_asktopaybranchcode'},
			{data: 'action', name: 'action'}
			
			  
        ]
    });
		
			
			
			///
		}*/
		
	//is user who will be paid to get persons that they will pay him
	
	
	function btcget_asktopay(){//is user who will be paid to get persons that they will pay him
		//$.fn.dataTableExt.sErrMode = 'throw';//if there is error 
	
			//
			// $.fn.dataTable.ext.errMode = 'none';
			Table = $('#btcwhopayme').DataTable({
        "processing": true,
        "serverSide": true,
		"destroy":true,
        "ajax": "{{ route('btcget_asktopay') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_asktopayname', name: 'user_asktopayname'},
            {data: 'user_asktopaycell', name: 'user_asktopaycell'},
            {data: 'user_asktopayemail', name: 'user_asktopayemail'},
			{data: 'user_asktopayamount', name: 'user_asktopayamount'},
			/* {data: 'user_asktopaybankname', name: 'user_asktopaybankname'},
			
			{data: 'user_asktopayaccountnumber', name: 'user_asktopayaccountnumber'},
			{data: 'user_asktopaybranchcode', name: 'user_asktopaybranchcode'},*/
			{data: 'user_asktogetpaidbtcaddress', name: 'user_asktogetpaidbtcaddress'},
		
			{data: 'action', name: 'action'}
			
			  
         ]
    });
	////
		
		$.ajax({
    url: 'js/counterjs/soon.js',
    success:function(){
		
	}
});
		
		
		///	
		
		
		
	}
		
	//is user who will be paid to get persons that they will pay him
	
	
	function get_payme(){////get payme is a customer who will view the person that he must pay
		Table = $('#whoipay').DataTable({
        "processing": true,
        "serverSide": true,
		"destroy":true,
        "ajax": "{{ route('get_payme') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_asktogetpaidname', name: 'user_asktogetpaidname'},
            {data: 'user_asktogetpaidcell', name: 'user_asktogetpaidcell'},
            {data: 'user_asktogetpaidemail', name: 'user_asktogetpaidemail'},
			{data: 'user_asktogetpaidamount', name: 'user_asktogetpaidamount'},
			 {data: 'user_asktogetpaidbankname', name: 'user_asktogetpaidbankname'},
			
			{data: 'user_asktogetpaidaccountnumber', name: 'user_asktogetpaidaccountnumber'},
			{data: 'user_asktogetpaidbranchcode', name: 'user_asktogetpaidbranchcode'},
			
			{data: 'action', name: 'action'},
			  
        ]
    });
	////
		
		$.ajax({
    url: 'js/counterjs/soon.js',
    success:function(){
		
	}
});
		
		///	
		
		
		
	}
	////get payme is a customer who will view the person that he must pay
	
	
	function btcget_payme(){////get payme is a customer who will view the person that he must pay
		Table = $('#btcwhoipay').DataTable({
        "processing": true,
        "serverSide": true,
		"destroy":true,
        "ajax": "{{ route('btcget_payme') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'user_asktogetpaidname', name: 'user_asktogetpaidname'},
            {data: 'user_asktogetpaidcell', name: 'user_asktogetpaidcell'},
            {data: 'user_asktogetpaidemail', name: 'user_asktogetpaidemail'},
			{data: 'user_asktogetpaidamount', name: 'user_asktogetpaidamount'},
			{data: 'user_asktogetpaidbtcaddress', name: 'user_asktogetpaidbtcaddress'},
			/* {data: 'user_asktogetpaidbankname', name: 'user_asktogetpaidbankname'},
			
			{data: 'user_asktogetpaidaccountnumber', name: 'user_asktogetpaidaccountnumber'},
			{data: 'user_asktogetpaidbranchcode', name: 'user_asktogetpaidbranchcode'},*/
			
			
		{data: 'action', name: 'action'},
			  
        ]
    });
	////
		
		$.ajax({
    url: 'js/counterjs/soon.js',
    success:function(){
		
	}
});
		
		///	
		
		
	}
	////get payme is a customer who will view the person that he must pay
	
	
	
	function table_users(){
		oTable = $('#users').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('dotest') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'username', name: 'username'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
			 {data: 'password_decode', name: 'password_decode'},
			{data:'cell',name:'cell'},
			{data:'bank_name',name:'bank_name'},
			{data:'account_number',name:'account_number'},
			{data:'branch_code',name:'branch_code'},
			 {data: 'btc_address', name: 'btc_address'},
        ]
    });
	}
	
		//function invest(){
//		oTable = $('#table_payme').DataTable({
//        "processing": true,
//        "serverSide": true,
//        "ajax": "{{ route('automatic1') }}",
//        "columns": [
//            
//            {data: 'name', name: 'name'},
//            {data: 'email', name: 'email'}
//        ]
//    });
//	}
	function adminalloc(id){
		////
		
			'use strict';
		var askmetopay_name=$('#askmetopay_name').val();
		var askmetopay_username=$('#askmetopay_username').val();
		var askmetopay_cell=$('#askmetopay_cell').val();
		var askmetopay_email=$('#askmetopay_email').val();
		var askmetopay_invtype=$('#askmetopay_invtype').val();
		var askmetopay_amount=$('#askmetopay_amount').val();
	$.ajax({
		url:"./adminalloc",
		type:"get",
		data:{id:id,askmetopay_name:askmetopay_name,askmetopay_username:askmetopay_username,askmetopay_cell:askmetopay_cell,askmetopay_email:askmetopay_email,askmetopay_invtype:askmetopay_invtype,askmetopay_amount:askmetopay_amount},
		success:function(data){
			
			//alert(data.message);
			
			 swal({
                title: "well Done!",
               text:data.message,
                type: "success"
	 
          });
			
			
			location.reload();
			
			
			
			
		
			
			
		}
	});
		
		return false;
		///
	}
	function single_select(id){
		////
		
		'use strict';
	$.ajax({
		url:"./single_select",
		type:"get",
		data:{id:id},
		success:function(data){
			$('#askmetopay_name').val(data.askmetopay[0].name);
			$('#askmetopay_username').val(data.askmetopay[0].username);
			
			$('#askmetopay_cell').val(data.askmetopay[0].cell);
			$('#askmetopay_email').val(data.askmetopay[0].email);
			
			$('#askmetopay_invtype').val(data.askmetopay[0].invest_type);
			
			$('#askmetopay_amount').val(data.askmetopay[0].amount);
			
			
		}
	});
		
		return false;
		
		///
	}
	function single_askmetopay(){
		//this is to run single query of askmetopay status limit by id
	'use strict';
	$.ajax({
		url:"./single_askmetopay",
		type:"get",
		success:function(data){
			$('#askmetopay_name').val(data.askmetopay[0].name);
			$('#askmetopay_username').val(data.askmetopay[0].username);
			
			$('#askmetopay_cell').val(data.askmetopay[0].cell);
			$('#askmetopay_email').val(data.askmetopay[0].email);
			
			$('#askmetopay_invtype').val(data.askmetopay[0].invest_type);
			
			$('#askmetopay_amount').val(data.askmetopay[0].amount);
			
			
		}
	});

		
	}
	
	
	function single_btcaskmetopay(){
		//this is to run single query of askmetopay status limit by id
	'use strict';
	$.ajax({
		url:"./single_btcaskmetopay",
		type:"get",
		success:function(data){
			//alert(data.askmetopay[0].name);
			$('#askmetopay_name').val(data.askmetopay[0].name);
			$('#askmetopay_username').val(data.askmetopay[0].username);
			
			$('#askmetopay_cell').val(data.askmetopay[0].cell);
			$('#askmetopay_email').val(data.askmetopay[0].email);
			
			$('#askmetopay_invtype').val(data.askmetopay[0].invest_type);
			
			$('#askmetopay_amount').val(data.askmetopay[0].amount);
			
			
		}
	});

		
	}
	function single_payme(){
		//this is to run single query of payme status limit by id
		$.ajax({
		url:"./single_payme",
		type:"get",
		success:function(data){
			
			$('#payme_name').val(data.payme[0].name);
		
		$('#payme_username').val(data.payme[0].username);
		
		$('#payme_cell').val(data.payme[0].cell);
			$('#payme_email').val(data.payme[0].email);
		
		$('#payme_bankname').val(data.payme[0].bank_name);
		
		
		$('#payme_banknumber').val(data.payme[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.payme[0].account_number);
		
		$('#payme_btcaddress').val(data.payme[0].btc_address);
		
			$('#payme_amount').val(data.payme[0].amount);
			
		}
	});
		
		
	}
	
	
	
	
	function single_btcpayme(){
		//this is to run single query of payme status limit by id
		$.ajax({
		url:"./single_btcpayme",
		type:"get",
		success:function(data){
			
			$('#payme_name').val(data.payme[0].name);
		
		$('#payme_username').val(data.payme[0].username);
		
		$('#payme_cell').val(data.payme[0].cell);
			$('#payme_email').val(data.payme[0].email);
		
		$('#payme_bankname').val(data.payme[0].bank_name);
		
		
		$('#payme_banknumber').val(data.payme[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.payme[0].account_number);
		
		$('#payme_btcaddress').val(data.payme[0].btc_address);
		
			$('#payme_amount').val(data.payme[0].amount);
			$('#payme_type').val('btc');
		}
	});
		
		
	}
	
	function single_adminpayme(){
		//this is to run single query of payme status limit by id
		$.ajax({
		url:"./single_adminpayme",
		type:"get",
		success:function(data){
			
		$('#payme_name').val(data.payme[0].name);
			$('#payme_username').val(data.payme[0].username);
			$('#payme_amount').val(data.payme[0].amount);
			
			$('#payme_cell').val(data.payme[0].cell);
			$('#payme_email').val(data.payme[0].email);
		
		$('#payme_bankname').val(data.payme[0].bank_name);
		
		
		$('#payme_banknumber').val(data.payme[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.payme[0].account_number);
		
		$('#payme_btcaddress').val(data.payme[0].btc_address);
			
		}
	});
		
		
		
	}
	
	function single_btcadminpayme(){
		//this is to run single query of payme status limit by id
		$.ajax({
		url:"./single_btcadminpayme",
		type:"get",
		success:function(data){
			
		$('#payme_name').val(data.payme[0].name);
			$('#payme_username').val(data.payme[0].username);
			$('#payme_amount').val(data.payme[0].amount);
			
			$('#payme_cell').val(data.payme[0].cell);
			$('#payme_email').val(data.payme[0].email);
		
		$('#payme_bankname').val(data.payme[0].bank_name);
		
		
		$('#payme_banknumber').val(data.payme[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.payme[0].account_number);
		
		$('#payme_btcaddress').val(data.payme[0].btc_address);
			
		}
	});
		
		
		
	}
	function single_reallocation(){
		//this is loading single reallocation
		
		$.ajax({
		url:"./single_reallocation",
		type:"get",
		success:function(data){
			
			$('#payme_name').val(data.reallocation[0].name);
			$('#payme_username').val(data.reallocation[0].username);
			$('#payme_amount').val(data.reallocation[0].amount);
			
			
			$('#payme_cell').val(data.reallocation[0].cell);
			$('#payme_email').val(data.reallocation[0].email);
		
		$('#payme_bankname').val(data.reallocation[0].bank_name);
		
		
		$('#payme_banknumber').val(data.reallocation[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.reallocation[0].account_number);
		
		$('#payme_btcaddress').val(data.reallocation[0].btc_address);
			
		}
	});
		
	}
	
	function single_btcreallocation(){
		//this is loading single reallocation
		
		$.ajax({
		url:"./single_btcreallocation",
		type:"get",
		success:function(data){
			
			$('#payme_name').val(data.reallocation[0].name);
			$('#payme_username').val(data.reallocation[0].username);
			$('#payme_amount').val(data.reallocation[0].amount);
			
			
			$('#payme_cell').val(data.reallocation[0].cell);
			$('#payme_email').val(data.reallocation[0].email);
		
		$('#payme_bankname').val(data.reallocation[0].bank_name);
		
		
		$('#payme_banknumber').val(data.reallocation[0].branch_code);
		
		
		$('#payme_accountnumber').val(data.reallocation[0].account_number);
		
		$('#payme_btcaddress').val(data.reallocation[0].btc_address);
			
		}
	});
		
	}
	
	function table_askmetopay(){
		//this is loading table with status askmetopay
		oTable = $('#table_asktopay').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_askmetopay') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	function table_btcaskmetopay(){
		//this is loading table with status askmetopay
		oTable = $('#table_asktopay').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_btcaskmetopay') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	function table_payme(){
		//this is loading table with status payme
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_payme') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	function table_btcpayme(){
		//this is loading table with status payme
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_btcpayme') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	
	function table_adminpayme(){
		//this is loading table with status payme
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_adminpayme') }}",
        "columns": [
            
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	function table_btcadminpayme(){
		//this is loading table with status payme
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_btcadminpayme') }}",
        "columns": [
            
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
	}
	
	function table_reallocation(){
		//this is loading table with status reallocation ;and reallocation will points same id
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_reallocation') }}",
        "columns": [
            
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
		
		//
	}
	
	function table_btcreallocation(){
		//this is loading table with status reallocation ;and reallocation will points same id
		oTable = $('#table_payme').DataTable({
        "processing": true,
        "serverSide": true,
			"destroy":true,
        "ajax": "{{ route('table_btcreallocation') }}",
        "columns": [
            
           {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},

            {data: 'amount', name: 'amount'},
			{data: 'action', name: 'action'}
        ]
    });
		
		//
	}
	function chooseallocchange(){
		$('#choosealloc').on('change',function(){
		////
			
			var choose=$('#choosealloc').val();
		if(choose==="automatic"){
			//1 load table invests with status of askmetopay and (askmetopay query limit by id asc)
			
			//2 load table invests with status of askmetopay  (order by id asc)
			
			//3 load table invests with status of payme and (payme query limit by id asc)
			
			//4 load table invests with status of payme (order by id asc)
			
			/***/
			$('#allocate').show();
				
				
			$('#payme_name').attr('readonly',false);
			$('#payme_amount').attr('readonly',false);
			table_askmetopay();
	table_payme();
	
	
	single_payme();
	single_askmetopay();
			
			/***/
		}
			else if(choose==="admin"){
			//1 load table invests with status of askmetopay and (askmetopay query limit by id asc)
			
			//2 load table invests with status of askmetopay  (order by id asc)
			
			//3 load table invests with status of payme and (payme query limit by id asc)
			
			//4 load table invests with status of payme (order by id asc)
			
			/***/
				$('#allocate').hide();
				$('#payme_name').attr('readonly','readyonly');
				$('#payme_amount').attr('readonly','readyonly');
			single_askmetopay();
			table_askmetopay();
			single_adminpayme();
			table_adminpayme();
				
			/***/
		}
		else if(choose==='reallocation'){
			//1 load table invests with status of askmetopay and (askmetopay query limit by id asc)
			
			//2 load table invests with status of askmetopay  (order by id asc)
			
			//3 load table invests with status of reallocation and (reallocation query limit by id asc)
			
			//4 load table invests with status of reallocation (order by id asc)
			
			/***/
			$('#allocate').show();
				
				
			$('#payme_name').attr('readonly',false);
			$('#payme_amount').attr('readonly',false);
			single_askmetopay();
			table_askmetopay();
			single_reallocation();
			table_reallocation();
			
			//checkamount();
			/***/
		}
		
		else if(choose==='manual'){
			// manual same as automatic but textfield are enable
		}
			//Note:all others conditions textfied are disabled
			////
		else if(choose==='bitcoin automatic')
			{
				
				////
				
				$('#allocate').show();
				
				
			$('#payme_name').attr('readonly',false);
			$('#payme_amount').attr('readonly',false);
				table_btcaskmetopay();
	table_btcpayme();
	
	
	single_btcpayme();
	single_btcaskmetopay();
				
				///
			}
			else if(choose==='bitcoin reallocation')
			{
				///
				
				$('#allocate').show();
				
				
			$('#payme_name').attr('readonly',false);
			$('#payme_amount').attr('readonly',false);
				single_btcaskmetopay();
			table_btcaskmetopay();
			single_btcreallocation();
			table_btcreallocation();
				
				///
			}
			else if(choose==='bitcoin admin')
			{
				///
			$('#allocate').hide();
				$('#payme_name').attr('readonly','readyonly');
				$('#payme_amount').attr('readonly','readyonly');
			single_btcaskmetopay();
			table_btcaskmetopay();
			single_btcadminpayme();
			table_btcadminpayme();
				
				///
			}
		});
	}
	
$(document).ready(function() {
	
	account();
	
    chooseallocchange();
	
	//invest();
	
	
	
	///test  Rand
	
	
	
	
	
	
	
	
	///test
	
	
	
	///test  bitcoin
	
	/*table_btcaskmetopay();
	table_btcpayme();
	btcget_payme();
	btcget_asktopay();
	
	single_btcpayme();
	single_btcaskmetopay();*/
	
	
	///test
	
});
		 
		 
	//confirm
	
	$(document).ready(function(){
	
	"use strict";
	$('#randconfirm').click(function(ev){
	//* click code */
		
			var status=$('#user_approvestatus').val();
		if(status==='approve'){
			////
			
			$.ajax({
			url:"./paymeapprove",
			type:"post",
			data:$('#confirm').serialize(),
			success:function(data){
		location.reload();
				$('#close').click();
				
			}
			
		});
			
			
			/////
			
		}
		else if(status==='Request allocation')
			{
				////
				$.ajax({
			url:"./request_allocation",
			type:"post",
			data:$('#confirm,#submit_invest').serialize(),
			success:function(data){
			location.reload();
				$('#close').click();
				
			}
			
		});
			
				
				
				///
			}
		
		
		//*click cod
		
		
		
		ev.preventDefault();
	});
	
});
	
	//confirm
	
		 
		 //btc confirm
	
	$(document).ready(function(){
	
	"use strict";
	$('#btcconfirm').click(function(ev){
		
					var status=$('#user_approvestatus').val();
		if(status==='approve'){
			////
			
			$.ajax({
			url:"./btcpaymeapprove",
			type:"post",
			data:$('#confirm').serialize(),
			success:function(data){
			location.reload();
					$('.btn btn-white').click();
			
			}
			
		});
			
			
			/////
			
		}
		else if(status==='Request allocation')
			{
				////
				$.ajax({
			url:"./btcrequest_allocation",
			type:"post",
			data:$('#confirm,#submit_invest').serialize(),
			success:function(data){
		location.reload();
					$('.btn btn-white').click();
				
			}
			
		});
			
				
				
				///
			}
		
		
		//*click cod
		ev.preventDefault();
	});
	
});
	
	//btc confirm
	
	//create admin users
	
	$(document).ready(function(){
	
	"use strict";
	$('#create_adminuser').click(function(ev){
		$.ajax({
			url:"./createadmin",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
			//alert(message);
				swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				table_users();
			}
			
		});
		
		ev.preventDefault();
	});
	
});

//user created by admin

//allocate functin

$(document).ready(function(){
	
	"use strict";
	$('#allocate').click(function(ev){
		$.ajax({
			url:"./allocate",
			type:"post",
			data:$('#submit_invest').serialize(),
			success:function(data){
				var message=data.message;
		
					
 swal({
                title: "well Done!",
               text:message,
                type: "success"
	 
          });
				
				location.reload();
				//checkamount();
			}
			
		});
		
		ev.preventDefault();
	});
	
});

//allocate function
	
	
		 
		 function account_check(){
			 "use strict";
	$.ajax({
		url:"./account_check",
		type:"get",
		
		success:function(data){
			
			alert("done");
		}
	});
		 }
	$(document).ready(function(){
		//
		$('#allocate_menu').click(function(ev){
			///
			
			$('#adminallocate_hide').show();
			 table_askmetopay();
	table_payme();
			 single_payme();
	single_askmetopay();
			
			//
		});
		ev.preventDefault();
		//
		//
		$('#users_menu').click(function(ev){
			 $('#adminusers_hide').show();
			 table_users();
		});
		ev.preventDefault();
		//
		//
		$('#edit_menu').click(function(ev){
			 $('#profile_edit').show();
		});
		ev.preventDefault();
		//
		
		
		
	});
	///menu action
		 function allocate(){
			 $('#adminusers_hide').show();
			 table_askmetopay();
	table_payme();
			 single_payme();
	single_askmetopay();
			 
		 }
		 function users(){
			  $('#adminusers_hide').show();
			 table_users();
		 }
		 function admin_all(){
			  $('#adminallocate_hide').show();
			 $('#adminusers_hide').show();
			 table_askmetopay();
	table_payme();
			 single_payme();
	single_askmetopay();
			  
			 table_users();
		 }
		 function edit_profile(){
			 $('#profile_edit').show();
			  account();
			 
			 $('#welcome').hide();
			

			

$('#randinvest_hide').hide();

$('#randtables_hide').hide();

$('#whoipay_hide').hide();
$('#btcinvest_hide').hide();
$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();


			 
			//return false;
		 }
		 
		 
		 function rand_invest(){
			
			 $('#randinvest_hide').show();
			 account();
			 
			 $('#welcome').hide();
			$('#profile_edit').hide();

			

$('#provide_helprand').show();

$('#randtables_hide').hide();

$('#whoipay_hide').hide();
$('#btcinvest_hide').hide();
$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();

			 //return false;
		 }
		 function rand_tables(){
			 
			$('#randtables_hide').show();
			 get_payme();
	get_asktopay();
			 
			  $('#welcome').hide();
			$('#profile_edit').hide();

			$('#randinvest_hide').hide();





$('#whoipay_hide').show();
$('#btcinvest_hide').hide();
$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();
			 
		 }
		 function rand_withdraw(){
			 
			  $('#randinvest_hide').show();
			 account();
			 $('#provide_helprand').hide();
			 $('#welcome').hide();
			$('#profile_edit').hide();

			



$('#randtables_hide').hide();

$('#whoipay_hide').hide();
$('#btcinvest_hide').hide();
$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();

			 //return false;
		 }
		 function btc_invest(){
			$('#btcinvest_hide').show();
			
			  btccountday();
			 
			 ///
			  $('#providehelp_hide').show();
			 
			  $('#welcome').hide();
			$('#profile_edit').hide();

			$('#randinvest_hide').hide();



$('#randtables_hide').hide();

$('#whoipay_hide').hide();

$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();
			 
			 ////
			 
		 }
		 function btc_tables(){
			 $('#btctables_hide').show();
			 $('#btcwhoipay_hide').show();
			 ///
			 
	$('#welcome').hide();
	$('#profile_edit').hide();

	$('#randinvest_hide').hide();



$('#randtables_hide').hide();

$('#whoipay_hide').hide();
$('#btcinvest_hide').hide();



$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();
			 
			 ////
			 
			 
			 btcget_payme();
	btcget_asktopay();
		 }
		 function btc_withdraw(){
			$('#btcinvest_hide').show();
			
			  btccountday();
			 
			 ///
			 $('#providehelp_hide').hide();
			  $('#welcome').hide();
			$('#profile_edit').hide();

			$('#randinvest_hide').hide();



$('#randtables_hide').hide();

$('#whoipay_hide').hide();

$('#btctables_hide').hide();
$('#btcwhoipay_hide').hide();

$('#adminusers_hide').hide();
$('#adminallocate_hide').hide();
			 
			 ////
		 }
		 //menu action
	//post request
	

	
	
	
	
	
	
	//post request
		 
</script>

</html>