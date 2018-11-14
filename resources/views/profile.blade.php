<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">
	<title>CRM</title>

	
			<!--autocomplete company-->
			<!--<link rel="stylesheet" href="css/autocomplete/fastselect.min.css">-->
	<!--autocomplete company-->
	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css ../assets/css/app.min.css -->

	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	
	   
	
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	
	<link href="{{URL('css/dataTables/datatables.min.css')}}" rel="stylesheet">
		 <link rel="stylesheet" href="css/countercss/soon.css" type="text/css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="{{URL('css/sweetalert.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	
	
	
	<style>

.error_div{
	color:crimson;
}
		.testbadge {
  color: white;
  display: inline-block; /* Inline elements with width and height. TL;DR they make the icon buttons stack from left-to-right instead of top-to-bottom */
  position: relative; /* All 'absolute'ly positioned elements are relative to this one */
  padding: 1px 5px; /* Add some padding so it looks nice */
}
		.button__badge {
  background-color: #fa3e3e;
  
  color: white;
 
  padding: 1px 3px;
  font-size: 10px;
  
  position: absolute; /* Position the badge within the relatively positioned button */
  top: 0;
  right: 0;
}



		div.dt-buttons{
			padding-right:25px;
			text-align:unset;
		}
		.dataTables_length{
		text-align: left;	
		}
		.pac-container {
    z-index: 1051 !important;
}
		.hideformadmin{
			display: none;
		}
		
		#mymenu{
			display: none;
		}
		.package{
			/*display: none;*/
		}
		.datesearch{
			display: none;
		}
		.too-right { text-align: right; }
	</style>
	


	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>

	
	 
	
	<script src="libs/bower/jquery/dist/jquery.js"></script>
	<script src="js/formupload/jquery.form.js"></script> 
	
	
 
	
	
	

</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary" >
<!--============= start main area -->

<!-- APP NAVBAR ==========-->
@include('template.menufolder.navbar')
<!--========== END app navbar -->

<!-- APP ASIDE ==========-->
@include('template.menufolder.sidemenu')
<!--========== END app aside -->

	
<form id="companyform"  method="post" enctype="multipart/form-data" action="{{url('add_company')}}">
  {{ csrf_field() }}


<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">






@include('template.companydetailmodal')
 @include('template.deletemodal')

 @include('template.companyform')

 



			

 
 <!--allocate table-->
 
<!---end line of submit investment-->
</form>


 

<!----main service--->
 
@include('template.main')

<!----main service--->

	




 

                            
                            
                            


 <!----upload table to service providers--->
 
  <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <footer class="app-footer">
      <div class="clearfix">
        <ul class="footer-menu pull-right">
          <li><a href="javascript:void(0)">Careers</a></li>
          <li><a href="javascript:void(0)">Privacy Policy</a></li>
          <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
        </ul>
        <div class="copyright pull-left">Copyright ericsoft123@gmail.com 2018 &copy;</div>
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



	
<!--	 <script src="http://malsup.github.com/jquery.form.js"></script> -->
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


	
	<!----main service--->
 
@include('template.script.script')

<!----main service--->



	
</html>