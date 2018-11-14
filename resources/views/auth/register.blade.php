<!DOCTYPE html>
<html lang="en">
<head>
	<title>BS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="loginfolder/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginfolder/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginfolder/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginfolder/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('loginfolder/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="{{ route('postsignup') }}">
				    {{ csrf_field() }}
					<a href="index.html"><span style="visibility:hidden">Back Home</span></a><span class="login100-form-title p-b-49">
						Signup
					</span>

					<div class="wrap-input100 validate-input m-b-23 {{ $errors->has('name') ? ' has-error' : '' }}" data-validate = "Name is required">
						<span class="label-input100">Name</span>
						<input class="input100" id="name" type="text"  name="name" value="{{ old('name') }}" placeholder="Name">
						<span class="focus-input100" data-symbol="&#xf106;"></span>
						@if ($errors->has('cell'))
						<span class="help-block"  style="color:red">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
                    </div>
                    
					<div class="wrap-input100 validate-input m-b-23 {{ $errors->has('username') ? ' has-error' : '' }}" data-validate = "Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
						 @if ($errors->has('username'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                    </div>
                    
					
                    
					<div class="wrap-input100 validate-input m-b-23 {{ $errors->has('cell') ? ' has-error' : '' }} " data-validate = "Tel is required">
						<span class="label-input100">Tel</span>
						<input class="input100"  name="cell" value="{{ old('cell') }}" placeholder="07882345567">
						<span class="focus-input100" data-symbol="&#xf2be;"></span>
						@if ($errors->has('cell'))
						<span class="help-block"  style="color:red">
							<strong>{{ $errors->first('cell') }}</strong>
						</span>
					@endif
                    </div>
                    
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Email">
						<span class="focus-input100" data-symbol="&#xf15a;"></span>
                    </div>
                    

					<div class="wrap-input100 validate-input {{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100"  id="password" type="password"  name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
						
						@if ($errors->has('password'))
                                    <span class="help-block"  style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Confirmation Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100"id="password-confirm" type="password"  name="password_confirmation" placeholder="Confirm Password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    

                    
					
                    <div class="text-right p-t-8 p-b-31" style="color:blue">
						
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Create Account
							</button>
						</div>
					</div>
                    <div class="text-right p-t-8 p-b-31" >
						<a href="login" style="color:blue">
                            Already registered?Sign In
						</a>
					</div>

					

				
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="loginfolder/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/profile.js"></script>
	
<!--===============================================================================================-->
	<script src="loginfolder/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="loginfolder/vendor/bootstrap/js/popper.js"></script>
	<script src="loginfolder/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="loginfolder/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="loginfolder/vendor/daterangepicker/moment.min.js"></script>
	<script src="loginfolder/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="loginfolder/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="loginfolder/js/main.js"></script>
	
	


</body>
</html>