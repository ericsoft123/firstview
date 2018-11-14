@extends('layouts.app')

@section('content')
<div class="container">
   <div class="overlay"></div>
 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="editmodal">
                               Edit profile:'{{Auth::user()->name}}'  
                            </button>
                            <!--start code modal-->
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" id="closedone" ><span aria-hidden="true" >&times;</span><span class="sr-only" >Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Edit Your Profile</h4>
                                            <small class="font-bold"><!--text-->
                                        </div>
                                        <div class="modal-body">
                                            
                                                   <form name="formeditprofile" id="formeditprofile" method="post">
                                                  	          {{ csrf_field() }}
                                                  	          <div class="form-group"><label>Username</label> <input type="text" placeholder="Enter your username" class="form-control" id="usname" name="usname" value="{{Auth::user()->username}}" readonly></div>
                                                  	          
                                                   	         <div class="form-group"><label>Name</label> <input type="text" placeholder="Enter your name" class="form-control" id="fname" name="fname" value="{{Auth::user()->name}}"></div>
                                                   	         
                                                   	         
                                                   	          <div class="form-group"><label>Email</label> <input type="text" placeholder="Enter your email" class="form-control" id="femail" name="femail" value="{{Auth::user()->email}}"></div>
                                                   	          
                                                   	          
                                                   	           <div class="form-group"><label>Password</label> <input type="text" placeholder="Enter your name" class="form-control" id="fpassword" name="fpassword" value="{{Auth::user()->password_decode}}"></div>
                                                   	           
                                                   	           
                                                   	            <div class="form-group"><label>Bitcoin Address </label> <input type="text" placeholder="Enter your name" class="form-control" id="fbitcoin" name="fbitcoin" value="{{Auth::user()->bitcoin_address}}"></div>
                                                   	        
                                                   	         
                                                   	         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="editprofile">Save changes</button>
                                        </div>
                                                   </form>
                                           
                                    </div>
                                </div>
                            </div>
                             
                             
                             <!---->
                           <div class="row">
 <div class="col-md-4"></div>
 	<div class="col-md-4" id="loading"><img src="images/5.gif"></div>
 	 <div class="col-md-4"></div>
 </div>    
                          
                            <!--end code edit modal-->
            <div class="panel panel-default" id="complete"><!--form started-->
                <div class="panel-heading" id="formname"></div>

                <div class="panel-body">
                    <form class="form-horizontal" id="formdata" >
                        {{ csrf_field() }}

                      
                        
                        <!---->
                        <div class="form-group{{ $errors->has('platform') ? ' has-error' : '' }}" id="platformdata">
                           
                         <div id="btc_charge"></div>
                          <div id="internal_wallet"></div>
                            <label for="name" class="col-md-4 control-label " id="plat">Platform</label>

                            <div class="col-md-6">
                                 <select id="platform" class="form-control" name="platform">
                                 	<option selected>Select One Platform</option>
                                 	<option>Super Bitcoin Value</option>
                                 	<option>SBV Mini</option>
                                 </select>

                                @if ($errors->has('platform'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('platform') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          
                            <div class="form-group" id="paymessage">
                         
                            <label for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                             
                             <p id="pay" style="color: darkgreen"></p>
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('registration_charge') ? ' has-error' : '' }}" id="registrationchargedata">
                         <!--btc_charge and internal wallet amount-->
                         
                           
                               <!---->
                            <label for="name" class="col-md-4 control-label" id="childmoneytext">Registration</label>

                            <div class="col-md-6">
                            
                            
                             <div class="input-group">
   
    <span class="input-group-addon" id="basic-addon1">R</span>
    <input id="registration_charge" type="text" class="form-control registration_charge" placeholder="There is No Values Selected " name="registration_charge" value="{{ old('registration_charge') }}" required autofocus>
    </div>
                             
                             <!-- <input id="registration_charge" type="text" class="form-control registration_charge" placeholder="There is No Values Selected " name="registration_charge" value="{{ old('registration_charge') }}" required autofocus>-->
                                 <input id="triangle_parents" type="hidden" class="form-control" placeholder="There is No Values Selected " name="triangle_parents" required autofocus>
                                 <input id="status" type="hidden" class="form-control" placeholder="There is No Values Selected " name="status" required autofocus>

                                @if ($errors->has('registration_charge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('registration_charge') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                        <!---->
                        <!--when there is none registration-->
                        <div id="none">
                        <div class="form-group{{ $errors->has('creator_money') ? ' has-error' : '' }}" id="creator_moneydata">
                           <div id="btc_investcharge"></div>
                          <div id="internal_investwallet"></div>
                            <label for="name" class="col-md-4 control-label" >Triangle Investment Value</label>

                            <div class="col-md-6">
                                <input id="creator_money" type="text" class="form-control" placeholder="Enter Money" name="creator_money" value="{{ old('creator_money') }}" required autofocus>
                                <input id="int_wallet" type="hidden" class="form-control" placeholder="Enter Money" name="int_wallet" value="{{ old('int_wallet') }}" >
                                <input id="btc_creamoney" type="hidden" class="form-control" placeholder="Enter Money" name="btc_creamoney" value="{{ old('btc_creamoney') }}" >

                                @if ($errors->has('creator_money'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('creator_money') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--child1-->
                        <div id="child1">
                        	<div class="form-group{{ $errors->has('child1_email') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="child1_email" type="text" class="form-control" placeholder="Enter Email" name="child1_email" value="{{ old('child1_email') }}" required autofocus> 

                                @if ($errors->has('child1_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child1_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         
                        <div class="form-group{{ $errors->has('address-country1') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                 <select id="address-country1" class="form-control" name="address-country1"></select>

                                @if ($errors->has('address-country1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address-country1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('child1_cell') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cell</label>

                            <div class="col-md-6">
                                <input id="child1_cell" type="hidden" class="form-control" name="child1_cell" value="{{ old('child1_cell') }}" required autofocus placeholder="i.e 0782377823">
                                 <input id="phone1" type="Tel" class="form-control" name="phone1"  required autofocus >  <!-- <input type="submit" class="addanother" id="addanothergrand" value="Addnew">-->

                                @if ($errors->has('child1_cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child1_cell') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>	
                        <!--end child1-->
                         
                        <!---child2--->
                        <div id="child2">
                        	                        <div class="form-group{{ $errors->has('child2_email') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">child2_email</label>

                            <div class="col-md-6">
                                <input id="child2_email" type="text" class="form-control" placeholder="Enter child2_email" name="child2_email" value="{{ old('child2_email') }}" required autofocus>

                                @if ($errors->has('child2_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child2_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address-country2') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                 <select id="address-country2" class="form-control" name="address-country2"></select>

                                @if ($errors->has('address-country2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address-country2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('child2_cell') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Cell</label>

                            <div class="col-md-6">
                                <input id="child2_cell" type="hidden" class="form-control" name="child2_cell" value="{{ old('child2_cell') }}" required autofocus placeholder="i.e 0782377823">
                                 <input id="phone2" type="Tel" class="form-control" name="phone2"  required autofocus >   <span><a href="#" class="remove">Remove This Child</a></span>

                                @if ($errors->has('child2_cell'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child2_cell') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                         <!--child2 -->

                         <!--<div class="form-group{{ $errors->has('child1_money') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">child1_money</label>

                            <div class="col-md-6">
                                <input id="child1_money" type="text" class="form-control" placeholder="Enter child1_money" name="child1_money" value="{{ old('child1_money') }}" required autofocus>

                                @if ($errors->has('child1_money'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child1_money') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('child2_money') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">child2_money</label>

                            <div class="col-md-6">
                                <input id="child2_money" type="text" class="form-control" placeholder="Enter child2_money" name="child2_money" value="{{ old('child2_money') }}" required autofocus>

                                @if ($errors->has('child2_money'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('child2_money') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                        @if (Auth::guest())
                        @else
                        <input type="hidden" value="{{ Auth::user()->username}}" id="creator_username" name="creator_username">
                        @endif
                        <!--<input type="hidden" value="eric" id="creator_username" name="creator_username">-->
                        <!-- div to hide all-->
                        </div>
                        
                        <!--when there is no registration-->
                         <div class="form-group{{ $errors->has('bitcoin_address') ? ' has-error' : '' }}" id="bitcoin_addressdata">
                            <label for="name" class="col-md-4 control-label">Bitcoin Address</label>

                            <div class="col-md-6">
                                <input id="bitcoin_address" type="text" class="form-control" placeholder="Enter Your Bitcoin Address" name="bitcoin_address" value="{{ old('bitcoin_address') }}" required autofocus>

                                @if ($errors->has('bitcoin_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bitcoin_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!---->
                         

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="activate" class="btn btn-primary activate">
                                    Activate Account
                                </button>
                                
                                
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div><!--form ended-->
            <!--profile-->
            
            
            <!--profile-->
        </div>
    </div>
     <div id="nextstep"></div>
     <!--sbvfilled-->
                     <div id="sbvfilled">
                             <!---->
                            <!---- i will put here Triangle---->
                         <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>Profile</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
                
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>Creator</h4>
                                <small>
                                 <form >
                                 	
                                 	
                                  
                                 </form>
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                     <table class="table small m-b-xs">
                        <tbody>
                         <tr>
                            <td>
                              
                         <strong>Creator:
                                <?php
							 $username1=Auth::user()->username;
							 $getsbv=DB::table('triangle_grands')
										->where([
			                                   ['creator_username',$username1],
			                                   ['triangle_status','built']
		                                       ])->first();
									if(isset($getsbv) && ($getsbv!=null)){
									
								
									 echo $creator_username=$getsbv->creator_username;
									$creator_money=$getsbv->creator_money;
										
									}
							
									
									?>
                                </strong>
                            </td>
                            <td>
                                <!---->
                                <strong>Invested:@if(isset($creator_money) && ($creator_money!=null))
                                {{$creator_money}}
                                @endif</strong> 
                            </td>

                        </tr>
                      <?php
							$username=Auth::user()->username;
							
								$users=DB::table('triangle_grands')
		->where([
			['creator_username',$username1],
			['triangle_status','built']
		])
			
			->get();
							
							if(isset($users) && ($users!=null)){
					$n=1;
		
		
		foreach($users as $user)
		{
			?>
			
                        <tr>
                            <td>
                                <strong>User:<?php echo $n;?>:<?php echo $user->child1_username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $user->child1_money?></strong> 
                            </td>

                        </tr>
			
			<?php
				$n++;
		}
							}
		?>
                                <!---->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <!--<small>Earnings</small>
                    <h2 class="no-margins">R<span id="earnings">206 480</span> </h2>
                   <small>Converted</small>
                    <h2 class="no-margins">BTC<span id="btc"> 206 480 206 480 </span>  </h2>-->
                    <div id="sparkline1"></div>
                </div>
                
  

            </div>
             </div>    
                     <!--------------------------------------------Details------------------------------------------------>
    <ul class="list-group">
  <li class="list-group-item">Username:<strong style="color: aliceblue">{{ Auth::user()->username}}</strong></li>
  <li class="list-group-item">Cell:<strong style="color: aliceblue">{{ Auth::user()->cell}}</strong></li>
   <li class="list-group-item">Email:<strong style="color: aliceblue">{{ Auth::user()->email}}</strong></li>
  <li class="list-group-item">Internal Wallet:<strong style="color: aliceblue">{{ Auth::user()->internal_wallet}}</strong></li>
  <li class="list-group-item">External Wallet:<strong style="color: aliceblue">{{ Auth::user()->bitcoin_address}}</strong></li>
  
</ul>       
           
 <!------------------------------------------------------------------------------------------------->
         
             </div>
     <!--sbvfilled-->
     <!--Profile---------------------------------------------------------------Profile-------------------->
                             <div id="profile">
                              
                                     
                                 <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>1BTC:<span id="btc_zar" style="color: orangered"></span> <h3>Growth To VCM Bonus<span class="badge badge-danger" >R<span id="bonus"></span></span></h3></h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4 id="profile_status1"></h4>
                                <small>
                                  <!--<form name="formreinvest" id="formreinvest">-->
                                 	 <input type="hidden" value="{{ Auth::user()->username}}" id="usernames" name="usernames">
                                  	 <button type="submit" id="reinvest" class="btn btn-danger">
                                   Reinvest
                                </button>
                                  <!--</form>-->
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>Status:</strong>
                            </td>
                            <td>
                                <strong><span id="profile_status2"></span></strong> 
                            </td>

                        </tr>
                        <tr>
                            <td>
                               <strong ></strong> Earnings
                            </td>
                            <td>
                                 R<strong id="profile_earning1"></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Triangle split:</strong> 
                            </td>
                            <td>
                                <strong><span><?php
									$sbvusername=Auth::user()->username;
									$getsbvtriangle_count=DB::table("triangle_grands")
										                  ->where([
															  ["creator_username",$sbvusername],
															  ["triangle_status","split"]
														  ])->count('creator_username');
									if(isset($getsbvtriangle_count)&&($getsbvtriangle_count!=null))
									{
										echo $getsbvtriangle_count/2;
									}
									?></span> &#9710;</strong> 
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <form name="profearning" id="profearning" method="post">
                <div class="col-md-4">
                    <small>Total Earnings</small>
                    <h2 class="no-margins"><span id="profile_earning2"></span> <span id="plus"> R</span><span id="vcm"></span>
                                  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">R</span>
    <input type="text" class="form-control" placeholder="Type Amount" aria-describedby="basic-addon1" id="userearning" name="userearning">
</div>
                                   <button type="submit" id="sbvwithdraw" class="btn btn-success">
                                   WithDraw
                                </button></h2>
					</form>
                   <small></small>
                    <h2 class="no-margins">BTC:<span ></span>  </h2>
                    
                    
                    <div id="sparkline1"></div>
                    
                </div>
                <!---->
                <form name="formupgrade" id="formupgrade">
                	<input type="hidden" id="upgradeusername" name="upgradeusername"  value="{{Auth::user()->username}}">
                	<button type="button" class="btn btn-danger btn-lg btn-block" id="upgrade">Upgrade to Super Triangle</button>
                </form>
<!--------------------------------------------Details------------------------------------------------>
    <ul class="list-group">
  <li class="list-group-item">Username:<strong style="color: aliceblue">{{ Auth::user()->username}}</strong></li>
  <li class="list-group-item">Cell:<strong style="color: aliceblue">{{ Auth::user()->cell}}</strong></li>
   <li class="list-group-item">Email:<strong style="color: aliceblue">{{ Auth::user()->email}}</strong></li>
  <li class="list-group-item">Internal Wallet:<strong style="color: aliceblue">{{ Auth::user()->internal_wallet}}</strong></li>
  <li class="list-group-item">External Wallet:<strong style="color: aliceblue">{{ Auth::user()->bitcoin_address}}</strong></li>
  
</ul>       
           
 <!------------------------------------------------------------------------------------------------->
<!---->
            </div>
             </div>   
             
             </div>
     <!--Profile-->
     
     <!--country Manager-->
      
                             <div id="admin">
                              
                                     
                                 <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2> BTC:<span id="btc_zaradmin"></span></h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-3">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>CounTry Manager</h4>
                                <small>
                                  <form name="formreinvest" id="formreinvest">
                                 	 <!--<input type="hidden" value="{{ Auth::user()->username}}" id="usernames" name="usernames">-->
                                  	<!-- <button type="submit"  class="btn btn-danger">
                                   Reinvest
                                </button>-->
                                  </form>
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--withdraw recharge-->
                 <div class="col-md-3 col-xs-12">
                  <!--  <small>Earnings on Registration</small>
                    <h2 class="no-margins">R<span id="registration">
                    	
                    	
                    </span> <button type="submit"  class="btn btn-success" id="adregwithdraw">
                                   WithDraw
                                </button></h2>
                                <input type="hidden" name="mreWithdraw" id="mreWithdraw">
                   <small>You will Get</small>
                    <h2 class="no-margins">BTC:<span  id="btc_reg">  </span>  </h2>
                    -->
                   <!-- <div id="sparkline1"></div>-->
                </div>
                <!--Recharge-->
               <!-- <form name="formadmin" id="formadmin">-->
                	 <div class="col-md-3 col-xs-12">
                  <!--  <small>Earnings On First Triangle</small>
                    <h2 class="no-margins">R<span id="first_triangle">
                    	
                    
                    </span> <button type="submit"  class="btn btn-success" id="adfirstWithdraw">
                                   WithDraw
                                </button></h2>
                                <input type="hidden" name="mftWithdraw" id="mftWithdraw">
                   <small>You will Get</small>
                    <h2 class="no-margins">BTC:<span  id="btc_admin">  </span>  </h2>
                    <input type="submit" class="popup" id="popup"
                  value="popup">-->
                   <!-- <div id="sparkline1"></div>-->
                </div>
             <!--   </form>-->
               <form name="admindata" id="admindata">
                <div class="col-md-3 col-xs-12">
                    <small>Please Type The Amount You Want To Withdraw</small>
                    <h2 class="no-margins"><span>
                    	<?php
						$admin=Auth::user()->username;
					 $adminvalue=DB::table("earnings")
							->where('username',$admin)
							->sum('total');
						?>
						<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">R</span>
    <input type="text" class="form-control" placeholder="Type Amount" aria-describedby="basic-addon1" name="adminmoney" value="<?php echo $adminvalue;?>">
</div>
					 <input type="hidden" name="adminusername" id="adminusername" value="{{Auth::user()->username}}">
						<?php	
						
						?>
                   
                    </span> <button type="submit"  class="btn btn-success" id="adswithdraw">
                                   WithDraw
                                </button></h2>
                <!--   <small>You will Get</small>
                    <h2 class="no-margins">BTC<span > 206 480 206 480 </span>  </h2>
                    
                    <div id="sparkline1"></div>-->
                </div>
                <!---->
</form>
<!---->
            </div>
             </div>   
             
             </div>
    
     <!--Country Manager-->
     
     <!---child filled--->
     
     <div id="childfilled">
                             <!---->
                         <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>Profile</h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
                
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>Triangle User</h4>
                                <small>
                                 <form >
                                 	
                                 	
                                  
                                 </form>
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                         <tr>
                            <td>
                              
                         <strong>Creator:
                                <?php
							 $username1=Auth::user()->username;
							 $getsbv=DB::table('triangle_grands')
										->where([
			                                   ['child1_username',$username1],
			                                   ['triangle_status','built']
		                                       ])->first();
									if(isset($getsbv) && ($getsbv!=null)){
									
								
									 echo $creator_username=$getsbv->creator_username;
									$creator_money=$getsbv->creator_money;
										
									}
							
									
									?>
                                </strong>
                            </td>
                            <td>
                                <!---->
                                <strong>Invested:@if(isset($creator_money) && ($creator_money!=null))
                                {{$creator_money}}
                                @endif</strong> 
                            </td>

                        </tr>
                      <?php
							$username=Auth::user()->username;
							
							if(isset($creator_username))//here in case creator is not available
							{
								$users=DB::table('triangle_grands')
		->where([
			['creator_username',$creator_username],
			['triangle_status','built']
		])
			
			->get();
							}
							if(isset($users) && ($users!=null)){
					$n=1;
		
		
		foreach($users as $user)
		{
			?>
			
                        <tr>
                            <td>
                                <strong>User:<?php echo $n;?>:<?php echo $user->child1_username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $user->child1_money?></strong> 
                            </td>

                        </tr>
			
			<?php
				$n++;
		}
							}
		?>
                                <!---->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                   <!-- <small>Earnings</small>
                    <h2 class="no-margins">R<span id="earnings">206 480</span> </h2>
                   <small>Converted</small>
                    <h2 class="no-margins">BTC<span id="btc"> 206 480 206 480 </span>  </h2>
                    <div id="sparkline1"></div>-->
                </div>


            </div>
             </div>    
                     
                   <!--------------------------------------------Details------------------------------------------------>
    <ul class="list-group">
  <li class="list-group-item">Username:<strong style="color: aliceblue">{{ Auth::user()->username}}</strong></li>
  <li class="list-group-item">Cell:<strong style="color: aliceblue">{{ Auth::user()->cell}}</strong></li>
   <li class="list-group-item">Email:<strong style="color: aliceblue">{{ Auth::user()->email}}</strong></li>
  <li class="list-group-item">Internal Wallet:<strong style="color: aliceblue">{{ Auth::user()->internal_wallet}}</strong></li>
  <li class="list-group-item">External Wallet:<strong style="color: aliceblue">{{ Auth::user()->bitcoin_address}}</strong></li>
    
  
</ul>       
           
 <!------------------------------------------------------------------------------------------------->
             </div>
     <!--child filled-->
     
     
     <!--------super Triangle start------------------------------------->
     <div class="modal inmodal" id="supertriangle" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" id="closesupertriangle1">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Super User Page</h4>
                                            <small class="font-bold"><!--text-->
                                        </div>
                                        <div class="modal-body">
                                            
                                                   <form name="formpata" id="formpata" >
                                                  	          {{ csrf_field() }}
                                                  	          
                                                  	          <h4 align="center" style="color: darkgreen"><span id="youwillget">You Will Get:</span><label id="supermoneydisplay">Invest Amount</label> </h4>
													   <div id="super_payment">
													   	
													   	<div class="form-group"><label ></label> <input type="text" placeholder="Enter investment Amount" class="form-control" id="supercreator_money" name="supercreator_money" value=""></div>
                                                  	          
                                                  	          
                                                  	          
                                                   	           
                                                   	            <div class="form-group"><label>Bitcoin Address </label> <input type="text" placeholder="Enter your name" class="form-control" id="super_creatorexternwallet" name="super_creatorexternwallet" value="{{Auth::user()->bitcoin_address}}"></div>
													   </div>
                                                  	          
                                                  	          <!---------------------------------------->
													   <div id="super_child">
													   	 <div class="form-group"><label>Email </label> <input type="text" placeholder="Enter first user Email" class="form-control" id="super_child3email" name="super_child3email" value=""></div>
                                                  	          
                                                  	          <div class="form-group"><label>Country </label>
                                                  	          <select id="address-country3" class="form-control" name="address-country3"></select>
                                                  	          </div>
                                                  	          <label>Cell phone </label>
                                                  	          <div class="form-group">
                                                  	           <input id="super_child3cell" type="hidden" class="form-control" name="super_child3cell" value="{{ old('child2_cell') }}" required autofocus placeholder="i.e 0782377823">
                                                  	          <input id="phone3" type="text" class="form-control" name="phone3"  required autofocus >  
                                                  	          </div>
													   </div>
                                                  	         
                                                  	          
                                                  	          
                                                  	          
                               
                                                  	          
                                                  	          
                                                  	          <!---------------------------------------------->
                                                   	        
                                                   	           
                                                   	     <div id="super_hiddeninput"> 
                                                   	     
                                                   	          
                                                   	               <div class="form-group"><label>Username</label> <input type="text" placeholder="Enter your username" class="form-control" id="super_creatorusername" name="super_creatorusername" value="{{Auth::user()->username}}" ></div>
                                                  	          
                                                  	           <div class="form-group"><label>Internal Wallet </label> <input type="text" placeholder="Enter your name" class="form-control" id="super_creatorinternwallet" name="super_creatorinternwallet" value="{{Auth::user()->internal_wallet}}"></div>     
													   
													   	 <div class="form-group"><label>Name</label> <input type="text" placeholder="Enter your name" class="form-control" id="fname" name="fname" value="{{Auth::user()->name}}"></div>
                                                   	         
                                                   	         
                                                   	          <div class="form-group"><label>Email</label> <input type="text" placeholder="Enter your email" class="form-control" id="femail" name="femail" value="{{Auth::user()->email}}"></div>
                                                   	          
                                                   	          
                                                   	           <div class="form-group"><label>Password</label> <input type="text" placeholder="Enter your name" class="form-control" id="fpassword" name="fpassword" value="{{Auth::user()->password_decode}}"></div>
													   </div>    
                                                   	        
                                                   	         
                                                   	         
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal" id="closesupertriangle2">Close</button>
                                            <button type="submit" class="btn btn-primary supersbv" id="supersbv">Save changes</button>
                                            <button type="submit" class="btn btn-primary test" id="test">test changes</button>
                                        </div>
                                                   </form>
                                           
                                    </div>
                                </div>
                            </div>
     
     
     <!--------Super Triangle Start-------------------------------------->
     
     <div id="super_filled">
                             <!---->
                         <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>Profile Super triangle filled </h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
                
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>Creator</h4>
                                <small>
                                 <form >
                                 	
                                 	
                                  
                                 </form>
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                           <strong>Creator:
                                <?php
							 $super_username1=Auth::user()->username;
							 $getsupersbv1=DB::table('super_triangles')
										->where([
			                                   ['super_creatorusername',$super_username1],
			                                   ['super_trianglestatus','built'],
											   
											
		                                       ])->first();
								        
										
								 
									if(isset($getsupersbv1) && ($getsupersbv1!=null)){
									
								
									 echo $super_creatorusername1=$getsupersbv1->super_creatorusername;
									$super_creatormoney1=$getsupersbv1->super_creatormoney;
										
									}
							
									
									?>
                                </strong>
                            </td>
                            <td>
                                <!---->
                                <strong>Invested:@if(isset($super_creatormoney1) && ($super_creatormoney1!=null))
                                {{$super_creatormoney1}}
                                @endif</strong> 
                            </td>
									
									
                        <tr>
                                         <?php
							$super_username1=Auth::user()->username;
							
								$super_user1=DB::table('super_triangles')
		->where([
			                                   ['super_creatorusername',$super_username1],
			                                   ['super_trianglestatus','built']
			                                  
										])->get();
							
							if(isset($super_user1) && ($super_user1!=null)){
					
		
		
		foreach($super_user1 as $super_users1)
		{
			?>
			
                        <tr>
                            <td>
                                <strong>User:1:<?php echo $super_users1->super_child1username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $super_users1->super_child1money?></strong> 
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>User:2:<?php echo $super_users1->super_child2username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $super_users1->super_child2money?></strong> 
                            </td>

                        </tr>
			
			<?php
				
		}
							}
		?>
                    </table>
                </div>
                <div class="col-md-3">
                    <!--<small>Earnings</small>
                    <h2 class="no-margins">R<span id="earnings">206 480</span> </h2>
                   <small>Converted</small>
                    <h2 class="no-margins">BTC<span id="btc"> 206 480 206 480 </span>  </h2>
                    <div id="sparkline1"></div>-->
                </div>
    <!---------------------------------------------------------------------------------------->
             <div class="clearfix borderbox" id="page"><!-- column -->
   <div class="museBGSize clearfix colelem" id="u182"><!-- group -->
    <div class="clearfix grpelem" id="u199-4"><!-- content -->
     <p>user1</p>
    </div>
    <div class="clearfix grpelem" id="pu208-4"><!-- column -->
     <div class="clearfix colelem" id="u208-4"><!-- content -->
      <p>creator:</p>
     </div>
     <div class="clearfix colelem" id="u202-4"><!-- content -->
      <p>user2</p>
     </div>
    </div>
   </div>
   <div class="verticalspacer" data-offset-top="302" data-content-above-spacer="302" data-content-below-spacer="198"></div>
  </div>
             <!------------------------------------------------------------------------------------------>

            </div>
             </div>    
                     
         
             </div>
     <!------------------------------------------------------------------->
     
     
     <!-------------------super child1filled----------------------------------->
     
     <div id="super_childfilled">
                             <!---->
                         <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>Profile Super triangle filled </h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
                
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>Creator</h4>
                                <small>
                                 <form >
                                 	
                                 	
                                  
                                 </form>
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                           <strong>Creator:
                                <?php
							 $super_username=Auth::user()->username;
							 $getsupersbv=DB::table('super_triangles')
										->where([
			                                   ['super_child1username',$super_username],
			                                   ['super_trianglestatus','built']
											
		                                       ])
								        ->orwhere([
											 ['super_child2username',$super_username],
			                                   ['super_trianglestatus','built']
										])->first();
								 
									if(isset($getsupersbv) && ($getsupersbv!=null)){
									
								
									 echo $super_creatorusername=$getsupersbv->super_creatorusername;
									$super_creatormoney=$getsupersbv->super_creatormoney;
										
									}
							
									
									?>
                                </strong>
                            </td>
                            <td>
                                <!---->
                                <strong>Invested:@if(isset($super_creatormoney) && ($super_creatormoney!=null))
                                {{$super_creatormoney}}
                                @endif</strong> 
                            </td>
									
									
                        <tr>
                                         <?php
							$super_username=Auth::user()->username;
							
								$super_user=DB::table('super_triangles')
		->where([
			                                   ['super_child1username',$super_username],
			                                   ['super_trianglestatus','built']
											
		                                       ])
								        ->orwhere([
											 ['super_child2username',$super_username],
			                                   ['super_trianglestatus','built']
										])->get();
							
							if(isset($super_user) && ($super_user!=null)){
					
		
		
		foreach($super_user as $super_users)
		{
			?>
			
                        <tr>
                            <td>
                                <strong>User:1:<?php echo $super_users->super_child1username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $super_users->super_child1money?></strong> 
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>User:2:<?php echo $super_users->super_child2username?></strong>
                            </td>
                            <td>
                                <strong>Invested:<?php echo $super_users->super_child2money?></strong> 
                            </td>

                        </tr>
			
			<?php
				
		}
							}
		?>
                    </table>
                </div>
                <div class="col-md-3">
                   <!-- <small>Earnings</small>
                    <h2 class="no-margins">R<span id="earnings">206 480</span> </h2>
                   <small>Converted</small>
                    <h2 class="no-margins">BTC<span id="btc"> 206 480 206 480 </span>  </h2>
                    <div id="sparkline1"></div>-->
                </div>
    <!---------------------------------------------------------------------------------------->
             <div class="clearfix borderbox" id="page"><!-- column -->
   <div class="museBGSize clearfix colelem" id="u182"><!-- group -->
    <div class="clearfix grpelem" id="u199-4"><!-- content -->
     <p>user1</p>
    </div>
    <div class="clearfix grpelem" id="pu208-4"><!-- column -->
     <div class="clearfix colelem" id="u208-4"><!-- content -->
      <p>creator:</p>
     </div>
     <div class="clearfix colelem" id="u202-4"><!-- content -->
      <p>user2</p>
     </div>
    </div>
   </div>
   <div class="verticalspacer" data-offset-top="302" data-content-above-spacer="302" data-content-below-spacer="198"></div>
  </div>
             <!------------------------------------------------------------------------------------------>

            </div>
             </div>    
                     
         
             </div>
     <!-------------------super child1filled----------------------------------->
     
     
     
     <div id="super_profile">
                              
                                     
                                 <div class="row wrapper border-bottom ">
                <div class="col-lg-10">
                    <h2>1BTC:<span  style="color: orangered">
                    	
                    	<?php
					//		$btc="https://api.cryptonator.com/api/ticker/btc-usd";
//		$btc_convert=file_get_contents($btc);
//		$btc_decode=json_decode($btc_convert);
//		 $btcusd=$btc_decode->ticker->price;
//		//print_r($btc_decode);
//		$url="http://api.fixer.io/latest?base=USD";
//		$test=file_get_contents($url);
//		
//		$decode=json_decode($test);
//	$usdzar=$decode->rates->ZAR;
//		$zar=$btcusd*$usdzar;
//						echo $zar;
						
						?>
                    </span> </h2>
                    
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="images/avatar.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    {{ Auth::user()->name }}
                                </h2>
                                <h4>Creator</h4>
                                <small>
                                  <!--<form name="formreinvest" id="formreinvest">-->
                                 	 <input type="hidden" value="{{ Auth::user()->username}}" id="usernamese" name="usernamese">
                                  	 <button type="submit"  class="btn btn-danger" id="super_reinvest">
                                   Reinvest In super Triangle
                                </button>
                                  <!--</form>-->
                                  
                                    <!--There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.-->
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>Status:</strong><span ></span>
                            </td>
                            <td>
                               <strong>Creator</strong>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                Earnings <strong></strong>
                            </td>
                            <td>
                                <strong>R</strong>  <?php
							 $super_userprofile=Auth::user()->username;
							 $getsuper_sum=DB::table('earnings')
										->where([
			                                   ['username',$super_userprofile],
			                                   
		                                       ])->first();
									if(isset($getsuper_sum) && ($getsuper_sum!=null)){
									
								
									 echo $getsuper_sum->total;
										
									}
								?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Triangle Split:</strong> 
                            </td>
                            <td>
                                
                                <strong><span ><?php
							 $super_userprofile=Auth::user()->username;
							 $getsuper_count=DB::table('super_triangles')
										->where([
			                                   ['super_creatorusername',$super_userprofile],
			                                   ['super_trianglestatus','split'],
											   ['super_platform','super_profile']
		                                       ])->count('super_creatorvalues');
									if(isset($getsuper_count) && ($getsuper_count!=null)){
									
								
									 echo $getsuper_count;
										
									}
								?></span> &#9710;</strong> 
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-md-4">
                    <small>Total Earnings</small>
                    <h2 class="no-margins">R<span id="super_profileamount"><?php
							 $super_userprofile=Auth::user()->username;
							 $getsuper_sumdraw=DB::table('earnings')
										->where([
			                                   ['username',$super_userprofile],
			                                  
		                                       ])->first();
									if(isset($getsuper_sumdraw) && ($getsuper_sumdraw!=null)){
									
								
									 echo $getsuper_sumdraw->total;
										
									}
								?></span>
                      <button type="submit"  class="btn btn-success">
                                   WithDraw
                                </button></h2>
                   <small>You will Get</small>
                    <h2 class="no-margins">BTC:<span></span>  </h2>
                    
                    
                    <div id="sparkline1"></div>
                    
                </div>
                <!---->
                <form  >
                	<input type="hidden"   value="{{Auth::user()->username}}">
                	<button type="button" class="btn btn-primary btn-lg btn-block">Super User Details</button>
                </form>
<!--------------------------------------------Details------------------------------------------------>
    <ul class="list-group">
  <li class="list-group-item">Username:<strong style="color: aliceblue">{{ Auth::user()->username}}</strong></li>
  <li class="list-group-item">Cell:<strong style="color: aliceblue">{{ Auth::user()->cell}}</strong></li>
   <li class="list-group-item">Email:<strong style="color: aliceblue">{{ Auth::user()->email}}</strong></li>
  <li class="list-group-item">Internal Wallet:<strong style="color: aliceblue">{{ Auth::user()->internal_wallet}}</strong></li>
  <li class="list-group-item">External Wallet:<strong style="color: aliceblue">{{ Auth::user()->bitcoin_address}}</strong></li>
  
</ul>       
           
 <!------------------------------------------------------------------------------------------------->
<!---->
            </div>
             </div>   
             
             </div>
</div>

           <!--Admin page----------------------------------------->
           
           
           <div class="row" id="adminregister">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('postadminregister') }}">
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
                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

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
                           <div class="form-group{{ $errors->has('money_toinvest') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Money Invested</label>

                            <div class="col-md-6">
                                <input id="money_toinvest" type="text" class="form-control" name="money_toinvest" value="{{ old('money_toinvest') }}" required autofocus placeholder="Enter Money To Invest">
                                 

                                @if ($errors->has('money_toinvest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('money_toinvest') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
           
           
           
           <!--Admin page------------------------------------------->
           <!--payment message-->
           <div class="modal fade" id="moneymessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
           <!--payment message-->
@endsection
