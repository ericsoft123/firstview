<!DOCTYPE html>
<html>
  <head>
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<link rel="stylesheet" href="{{URL('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/css/uikit.min.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<style>
	input[type=text], select,.form-group {
    width: 100%;
    padding: 5px 10px;
    
    display: inline-block;
    
    box-sizing: border-box;
}
	  
	  </style>
  </head>
  <body>
    <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
        <div class="uk-background-cover" style="background-image: url('images/2.jpg');" uk-height-viewport></div>
        <div class="uk-padding-large">
          

            <h2 class="uk-heading-line uk-text-center" style="font-family: Roboto"><span>CREATE PROFILE</span></h2>
          
            
            <div class="uk-margin uk-card uk-card-default uk-card-body">
          
          <!---->
          <form class="form-horizontal" method="POST" action="{{ route('postsignup') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address-country') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                 <select id="address-country" class="form-control" name="address-country"></select>

                                @if ($errors->has('address-country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address-country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('cell') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cell</label>

                            <div class="col-md-6">
                                <input id="cell" type="hidden" class="form-control" name="cell" value="{{ old('cell') }}" required autofocus placeholder="i.e 0782377823">
                                 <input id="phone" type="Tel" class="form-control" name="phone"  required autofocus >

                                @if ($errors->has('cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cell') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        
                        <div class="text-xs-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already have an account? <a href="testlogin">Login</a></div>
                        </div>
                    </form>
          <!---->
          
          </div>

        </div>
    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.42/js/uikit-icons.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
     <script src="{{url('build/js/intlTelInput.js')}}"></script>
   <!--This is for input flag for phone number-->

<script src="{{url('js/jsajax.js')}}"></script>
<script src="{{url('js/profile.js')}}"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>-->
  </body>

</html>
