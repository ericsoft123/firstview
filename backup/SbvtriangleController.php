<?php

namespace App\Http\Controllers;
use App\User;
use App\BlockIo;
use Illuminate\Http\Request;
use DB;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Mail;
class SbvtriangleController extends Controller
{
    //
	public function createsbv(Request $request){ //this is to create triangle
		
		
			///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		
		
		

		////////////////////////////////////////////////////////////////
		// api check  money paid//
		//if money available on block.io address(internal wallet)-btc charge(availbe on users table)>=(5500 convert on btc on that day)
//		Then update users(child_money=$creator_money,update btc_child_money=blockio address money-btc charge from users table ) and platform changed to 
//			
//			...sbvanotherchild
//			
//			else 
//				update btc_child_money=blockio address money-btc_charge from users table
			
		
		// api check  money paid//
		
		
		//new code//
		
		
      $creator_username=$request->input('creator_username');
	
      $creator_money=$request->input('creator_money');
       $bitcoin_address=$request->input('bitcoin_address');
	   $btc_childmoney=$creator_money/$zar;    //This the child1_money equivalent to btc that money must not be<R5500 here i took reference that one btc is equal 600000
	

//end this is to save generated user name,email,password in database users using model user located in backup
		////update creator to be added  sbvanotherchild
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			
			///'platform'=>'sbvanotherchild',//this will be  activated through Api
			 'child_money'=>$creator_money,//
			 'btc_childmoney'=>$btc_childmoney,
			 'bitcoin_address'=>$bitcoin_address,
			 
		
		]
		 
		 );
		
		
		////
     
	}
	public function sbvanotherchild(Request $request){
			
     	$username1=str_random(5);
		
		$password1=str_random(8);
		
		
      $creator_username=$request->input('creator_username');
	 $triangle_parents=$creator_username;
      $creator_money=$request->input('creator_money');
      
	 
	  $child1_email=$request->input('child1_email');
	  
	  $child1_cell=$request->input('child1_cell');
	 
		//$btc_creamoney=$request->input('btc_creamoney');
//		 $int_wallet=$request->input('int_wallet');
		$btc_creamoney=$request->input('btc_creamoney');
		 $int_wallet=$request->input('int_wallet');
	 // $registration_charge=$request->input('registration_charge');
	 
	  $address_country1=$request->input('address-country1');
	  
		//$status="inactive";
		
	$child1_username=substr($child1_email,0,strrpos($child1_email,'@'))."".$username1;
	
		
   
		$today = date("Y-m-d H:i:s"); 
  
		$child_number=1;
		// check if other user are available disabling adding 3 users
		$checks=DB::select("select *from triangle_grands where 	triangle_parents='$triangle_parents' and child_number='1' and triangle_status='built'");
		///
		if(!$checks)
		{
			DB::insert('insert into  triangle_grands(creator_username,creator_money,child1_username,child1_cell,child1_email,child_number,triangle_parents,btc_creamoney,creaintern_wallet,created_at,updated_at)
      values(?,?,?,?,?,?,?,?,?,?,?)',array($creator_username,$creator_money,$child1_username,$child1_cell,$child1_email,$child_number,$triangle_parents,$btc_creamoney,$int_wallet,$today,$today));
		
		
//		// start this is to save generated user name,email,password in database users using model user located in backup
		$user=new User([
			//this is to initialize model and input type
			'name'=>$username1,
			'username'=>$child1_username,
			'address-country'=>$address_country1,
			'cell'=>$child1_cell,
			'email'=>$child1_email,
			'password'=>bcrypt($password1),
			'password_decode'=>$password1,
			'status'=>'inactive',
			'platform'=>'child_grand',
			//
			'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		

//end this is to save generated user name,email,password in database users using model user located in backup
		////update creator to be added  sbvanotherchild
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			
			'platform'=>'sbvnextchild',
			 
			 
		
		]
		 
		 );
		///////////////////////////////////////////////////////////////////email/////////////////////////////
			
			//php email confirmation message
				
			$mail = new PHPMailer;
		

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
						$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
			$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'excellentia1ltd@gmail.com';          // SMTP username
$mail->Password = '1234bigi'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('excellentia1ltd@gmail.com', 'ADMIN LETTER');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'ADMIN LETTERS');
$mail->addAddress($child1_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent ='<body width="100%" height="100%" bgcolor="#e0e0e0" style="margin: 0;" yahoo="yahoo">

<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#e0e0e0" style="border-collapse:collapse;">
  <tr>
    <td><center style="width: 100%;">
        
        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> (Optional) This text will appear in the inbox preview, but not the email body. </div>
        <!-- Visually Hidden Preheader Text : END -->
        
        <div style="max-width: 600px;"> 
          <!--[if (gte mso 9)|(IE)]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]--> 
          
          <!-- Email Header : BEGIN --><h3>Welcome '.$child1_email.' to SBV <h3>
          <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
            <tr>
              <td style="padding: 20px 0; text-align: center"><img src="images/Image_200x50.png" width="200" height="50"  border="0"></td>
            </tr>
          </table>
          <!-- Email Header : END --> 
          
          <!-- Email Body : BEGIN -->
          <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="max-width: 600px;">
            
            <!-- Hero Image, Flush : BEGIN -->
            <tr>
              <td class="full-width-image" align="center" ><img src="images/Image_600x30.png" width="600"  border="0" style="width: 100%; max-width: 600px; height: auto;"></td>
            </tr>
            <!-- Hero Image, Flush : END --> 
            
            <!-- 1 Column Text : BEGIN -->
            <tr>
              <td><table cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr>
                    <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat. <br>
                      <br>
                      
                      <!-- Button : Begin -->
                      
                      <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                        <tr>
                          <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td"><a href="http://www.google.com" style="background: #222222; border: 15px solid #222222; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a"> 
                            <!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->A Button<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--> 
                            </a></td>
                        </tr>
                      </table>
					   <p align="center" >You Must Login using:</p>
                      <p align="center"><span style="color: blue">Username:</span>'.$child1_username.'</p>
                      <p align="center"><span style="color: blue">Password:</span>'.$password1.'</p>
                      <!-- Button : END --> 
                      <br>
                      Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat. </td>
                  </tr>
                </table></td>
            </tr>
            <!-- 1 Column Text : BEGIN --> 
            
            <!-- Two Even Columns : BEGIN -->
            <tr>
              <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%"><!--[if mso]>
                        <table cellspacing="0" cellpadding="0" border="0" align="center" width="560">
                        <tr>
                        <td align="center" valign="top" width="560">
                        <![endif]-->
                
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:560px;">
                  <tr>
                    <td align="center" valign="top" style="font-size:0; padding: 10px 10px 30px 10px;"><!--[if mso]>
                         <table border="0" cellspacing="0" cellpadding="0" align="center" width="560">
                            <tr>
                               <td align="left" valign="top" width="280">
                    <![endif]-->
                      
                      <div style="display:inline-block; max-width:50%; margin: 0 -2px; vertical-align:top; width:100%;" class="stack-column">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding: 0 20px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                <tr>
                                  <td style="text-align: center;"><img src="images/Image_200x200.png" width="200" alt="" style="border: 0;width: 100%;max-width: 200px;height: auto;" class="center-on-narrow"></td>
                                </tr>
                                <tr>
                                  <td style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding-top: 10px;" class="stack-column-center"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos&nbsp;himenaeos. </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                      
                      <!--[if mso]>
                                    </td>
                                    <td align="left" valign="top" width="280">
                                    <![endif]-->
                      
                      <div style="display:inline-block; max-width:50%; margin: 0 -2px; vertical-align:top; width:100%;" class="stack-column">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding: 0 20px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                <tr>
                                  <td style="text-align: center;"><img src="images/Image_200x200.png" width="200" alt="" style="border: 0;width: 100%;max-width: 200px;height: auto;" class="center-on-narrow"></td>
                                </tr>
                                <tr>
                                  <td style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding-top: 10px;" class="stack-column-center"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos&nbsp;himenaeos. </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                      
                      <!--[if mso]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]--></td>
                  </tr>
                </table>
                
                <!--[if mso]>
                        </td>
                        </tr>
                        </table>
                        <![endif]--></td>
            </tr>
            <!-- Two Even Columns : END -->
            
          </table>
          <!-- Email Body : END --> 
          
          <!-- Email Footer : BEGIN -->
          <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
            <tr>
              <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;"><webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion>
                <br>
                <br>
                Company Name<br>
                <span class="mobile-link--footer">Adobe Systems Incorporated, 345 Park Avenue</span> <br>
                <br>
                <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe></td>
            </tr>
          </table>
          <!-- Email Footer : END --> 
          
          <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]--> 
        </div>
      </center></td>
  </tr>
</table>
</body>' ;
		//$bodyContent ='<p><a href="http://localhost:8000/confirm?email='.$email.'&&code='.$str.'">Click Here for confirmation</a></p>' ;

$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'Email confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	
}
		
		///
		//email
			
			
			
			
			//////////////////////////////////////////////////////////////////email/////////////////////////
		
		}
		else{
			echo"please do not insert duplicate values";
		}
		
	
	}
	public function sbvnextchild(Request $request){ //next is to correct sbvanother child
		$username1=str_random(5);
		
		$password1=str_random(8);
		
		
      $creator_username=$request->input('creator_username');
	 $triangle_parents=$creator_username;
      $creator_money=$request->input('creator_money');
      
	 
	  $child1_email=$request->input('child1_email');
	  
	  $child1_cell=$request->input('child1_cell');
	  
	 // $registration_charge=$request->input('registration_charge');
	 
	  $address_country1=$request->input('address-country1');
	  
		//$status="inactive";
		 $child1_cell=$request->input('child1_cell');
	  $btc_creamoney=$request->input('btc_creamoney');
		 $int_wallet=$request->input('int_wallet');
	$child1_username=substr($child1_email,0,strrpos($child1_email,'@'))."".$username1;
	
		
   
		$today = date("Y-m-d H:i:s"); 
        $child_number=2;
		
		// check if other user are available disabling adding 3 users
		$checks=DB::select("select *from triangle_grands where 	triangle_parents='$triangle_parents' and child_number='2' and triangle_status='built'");
		///
		
		if(!$checks){
		DB::insert('insert into  triangle_grands(creator_username,creator_money,child1_username,child1_cell,child1_email,child_number,triangle_parents,btc_creamoney,creaintern_wallet,created_at,updated_at)
      values(?,?,?,?,?,?,?,?,?,?,?)',array($creator_username,$creator_money,$child1_username,$child1_cell,$child1_email,$child_number,$triangle_parents,$btc_creamoney,$int_wallet,$today,$today));
		
		
//		// start this is to save generated user name,email,password in database users using model user located in backup
		$user=new User([
			//this is to initialize model and input type
			'name'=>$username1,
			'username'=>$child1_username,
			'address-country'=>$address_country1,
			'cell'=>$child1_cell,
			'email'=>$child1_email,
			'password'=>bcrypt($password1),
			'password_decode'=>$password1,
			'status'=>'inactive',
			'platform'=>'child_grand',
			//
			'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		

//end this is to save generated user name,email,password in database users using model user located in backup
		////update creator to be added  sbvanotherchild
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			
			'platform'=>'sbvfilled',
			 
			 
		
		]
		 
		 );	
					///////////////////////////////////////////////////////////////////email/////////////////////////////
			
			//php email confirmation message
				
			$mail = new PHPMailer;
		

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
						$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;  
			$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'excellentia1ltd@gmail.com';          // SMTP username
$mail->Password = '1234bigi'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('excellentia1ltd@gmail.com', 'ADMIN LETTER');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'ADMIN LETTERS');
$mail->addAddress($child1_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent ='<body width="100%" height="100%" bgcolor="#e0e0e0" style="margin: 0;" yahoo="yahoo">

<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#e0e0e0" style="border-collapse:collapse;">
  <tr>
    <td><center style="width: 100%;">
        
        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> (Optional) This text will appear in the inbox preview, but not the email body. </div>
        <!-- Visually Hidden Preheader Text : END -->
        
        <div style="max-width: 600px;"> 
          <!--[if (gte mso 9)|(IE)]>
            <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
            <tr>
            <td>
            <![endif]--> 
          
          <!-- Email Header : BEGIN --><h3>Welcome '.$child1_email.' to SBV <h3>
          <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
            <tr>
              <td style="padding: 20px 0; text-align: center"><img src="images/Image_200x50.png" width="200" height="50"  border="0"></td>
            </tr>
          </table>
          <!-- Email Header : END --> 
          
          <!-- Email Body : BEGIN -->
          <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="max-width: 600px;">
            
            <!-- Hero Image, Flush : BEGIN -->
            <tr>
              <td class="full-width-image" align="center" ><img src="images/Image_600x30.png" width="600"  border="0" style="width: 100%; max-width: 600px; height: auto;"></td>
            </tr>
            <!-- Hero Image, Flush : END --> 
            
            <!-- 1 Column Text : BEGIN -->
            <tr>
              <td><table cellspacing="0" cellpadding="0" border="0" width="100%">
                  <tr>
                    <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat. <br>
                      <br>
                      
                      <!-- Button : Begin -->
                      
                      <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                        <tr>
                          <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td"><a href="http://www.google.com" style="background: #222222; border: 15px solid #222222; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a"> 
                            <!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->A Button<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--> 
                            </a></td>
                        </tr>
                      </table>
					   <p align="center" >You Must Login using:</p>
                      <p align="center"><span style="color: blue">Username:</span>'.$child1_username.'</p>
                      <p align="center"><span style="color: blue">Password:</span>'.$password1.'</p>
                      <!-- Button : END --> 
                      <br>
                      Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent laoreet malesuada cursus. Maecenas scelerisque congue eros eu posuere. Praesent in felis ut velit pretium lobortis rhoncus ut&nbsp;erat. </td>
                  </tr>
                </table></td>
            </tr>
            <!-- 1 Column Text : BEGIN --> 
            
            <!-- Two Even Columns : BEGIN -->
            <tr>
              <td bgcolor="#ffffff" align="center" height="100%" valign="top" width="100%"><!--[if mso]>
                        <table cellspacing="0" cellpadding="0" border="0" align="center" width="560">
                        <tr>
                        <td align="center" valign="top" width="560">
                        <![endif]-->
                
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:560px;">
                  <tr>
                    <td align="center" valign="top" style="font-size:0; padding: 10px 10px 30px 10px;"><!--[if mso]>
                         <table border="0" cellspacing="0" cellpadding="0" align="center" width="560">
                            <tr>
                               <td align="left" valign="top" width="280">
                    <![endif]-->
                      
                      <div style="display:inline-block; max-width:50%; margin: 0 -2px; vertical-align:top; width:100%;" class="stack-column">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding: 0 20px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                <tr>
                                  <td style="text-align: center;"><img src="images/Image_200x200.png" width="200" alt="" style="border: 0;width: 100%;max-width: 200px;height: auto;" class="center-on-narrow"></td>
                                </tr>
                                <tr>
                                  <td style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding-top: 10px;" class="stack-column-center"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos&nbsp;himenaeos. </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                      
                      <!--[if mso]>
                                    </td>
                                    <td align="left" valign="top" width="280">
                                    <![endif]-->
                      
                      <div style="display:inline-block; max-width:50%; margin: 0 -2px; vertical-align:top; width:100%;" class="stack-column">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding: 0 20px;"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 14px;text-align: left;">
                                <tr>
                                  <td style="text-align: center;"><img src="images/Image_200x200.png" width="200" alt="" style="border: 0;width: 100%;max-width: 200px;height: auto;" class="center-on-narrow"></td>
                                </tr>
                                <tr>
                                  <td style="font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; padding-top: 10px;" class="stack-column-center"> Maecenas sed ante pellentesque, posuere leo id, eleifend dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos&nbsp;himenaeos. </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table>
                      </div>
                      
                      <!--[if mso]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]--></td>
                  </tr>
                </table>
                
                <!--[if mso]>
                        </td>
                        </tr>
                        </table>
                        <![endif]--></td>
            </tr>
            <!-- Two Even Columns : END -->
            
          </table>
          <!-- Email Body : END --> 
          
          <!-- Email Footer : BEGIN -->
          <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;">
            <tr>
              <td style="padding: 40px 10px;width: 100%;font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: center; color: #888888;"><webversion style="color:#cccccc; text-decoration:underline; font-weight: bold;">View as a Web Page</webversion>
                <br>
                <br>
                Company Name<br>
                <span class="mobile-link--footer">Adobe Systems Incorporated, 345 Park Avenue</span> <br>
                <br>
                <unsubscribe style="color:#888888; text-decoration:underline;">unsubscribe</unsubscribe></td>
            </tr>
          </table>
          <!-- Email Footer : END --> 
          
          <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]--> 
        </div>
      </center></td>
  </tr>
</table>
</body>' ;
		//$bodyContent ='<p><a href="http://localhost:8000/confirm?email='.$email.'&&code='.$str.'">Click Here for confirmation</a></p>' ;

$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'Email confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	
}
		
		///
		//email
			
			
			
			
			//////////////////////////////////////////////////////////////////email/////////////////////////
		
		}
		else{
			echo"we can not insert something inside";
		}
		
	}
	public function creator_activated(Request $request){
		
		
			///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		
		
		

		////////////////////////////////////////////////////////////////
		//
		 $bitcoin_address=$request->input('bitcoin_address');
		 $creator_username=$request->input('creator_username');
		 $triangle_parents=$creator_username;
		  $registration_charge=$request->input('registration_charge');
		////
		//
		//this code will run on  other Method and can be called in ajax runtime 
//		if  money available on this address >=200(btc_charge(usertable))(converted on bicoin on this time)
//			Then do  update platform ;address_amount on users table
//				else update  amount on this address on address_amount table 
		
		//
		
		//api parts
		
		/// avoiding create a lot of more payment address for no reason
		$checks=DB::select("select *from users where username='$creator_username' and platform='none' and internal_wallet='none'");
		
		///
		if($checks)
		{
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
//		$succees=$block_io->get_balance()->status;
		
		
		//this for Testing purpose only //
		//$internal_wallet=$block_io->get_address_by(array('label' => 'bisoso'))->data->address;
			//$block_io->get_new_address();
			//test
			//$internal_wallet=$block_io->get_new_address(array('label' => $creator_username))->data->address; 
			$internal_wallet=$block_io->get_new_address()->data->address; 
		$btc_charge=60/$zar;  //money of  registration converted to bitcoin here i take referance 1btc=60000 that equal to 0.004BTC=200
		
		//here i will check if money payed by customer is <equal than money send to address when it
		//is that case means That status will be activated itself
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			'status'=>'active',
			//'platform'=>'creator_activated',//this option will be updated  when we will get received payment
			 'registration_charge'=>$registration_charge,//here it is bitcoin values
			 'bitcoin_address'=>$bitcoin_address,
			 'internal_wallet'=>$internal_wallet,
			 'btc_charge'=>$btc_charge,
		      //inernal will be genereted on registration
		]
		 
		 );
		}
		else{
			echo"hello";
		}
		
		
		
		
		
		
		
		
		
		
	}
	public function activate_childgrand(Request $request)
	{
		///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		
		
		

		////////////////////////////////////////////////////////////////
		$creator_username=$request->input('creator_username'); //means that it is equal to authenticated users
		 $creator_money=$request->input('creator_money');
		 $bitcoin_address=$request->input('bitcoin_address');
		$registration_charge=$request->input('registration_charge');
		
		
	//	$creator_username=$request->input('creator_username'); //means that it is equal to authenticated users
//		 $creator_money=$request->input('creator_money');
//		 $bitcoin_address=$request->input('bitcoin_address');
//		$registration_charge=$request->input('registration_charge');
//		//update triangle grands table first
//		DB::table('triangle_grands')
//				->where([
//			  'creator_username'=>$creator_username,
//			 'triangle_status'=>'built',
//				])
//			->update([
//				
//				''
//			]);
//		//then updating users table
//		DB::table('users')
//           ->where('username',$creator_username)
//         ->update(
//		 [
//			//this is to initialize model and input type
//			
//			'status'=>'active',
//			'platform'=>'childgrand_activated',
//			 'registration_charge'=>$registration_charge,
//			 'bitcoin_address'=>$bitcoin_address,
//		
//		]
//		 
//		 );///
		
		$checks=DB::select("select *from users where username='$creator_username' and platform='child_grand' and internal_wallet='none'");
		
		if($checks){
				$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
//		$succees=$block_io->get_balance()->status;
		
		
		
		//$internal_wallet=$block_io->get_address_by(array('label' => 'spupha44'))->data->address; //This will be replaced with new wallet generated
			//$internal_wallet=$block_io->get_new_address(array('label' => $creator_username))->data->address;
			$internal_wallet=$block_io->get_new_address()->data->address;
		//$btc_charge=0.004; 
			$btc_charge=60/$zar;
//		
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			'status'=>'active',
			//'platform'=>'childgrand_activated',
			 'registration_charge'=>$registration_charge,
			 'bitcoin_address'=>$bitcoin_address,
			 ///
			 'internal_wallet'=>$internal_wallet,
			 'btc_charge'=>$btc_charge,
			 
			 ///
		
		]
		 
		 );
		}
		
		////
			
	}
	public function learncase(){
		
	$checkone=DB::select("select *from triangle_grands where creator_username='$triangle_parents' and child1_money=0 and child_number=1 and triangle_status='built' and child1_username='$creator_username'");
		//$status=$request->input('status');
		$counter=DB::table('triangle_grands')
		 ->where([
			     'creator_username'=>$triangle_parents,
			     'child1_money'=>0,
			      'triangle_status'=>'built',
		 ])
		 ->count('child1_username');
		
		
		//echo $counter;
		if($counter==2)
		{
		
				DB::table('users')
					->where([
						'username'=>$creator_username,
						
					])
					->update([
						
						'platform'=>'child1_invested',
						
						
					]);
			//save child details in users tables
			//update creator platform in users table
		}
		else if($counter==1 and $checkone){
			
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						
						'platform'=>'child1_invested',
						
						
					]);
			//save child details in users tables
			//update creator platform in users table
		}
		else if($counter==1)
		{
			$checkmoney=DB::select("select * from triangle_grands where creator_username='$triangle_parents' and triangle_status='built' and child1_money!=0");
			foreach($checkmoney as $checkuser)
			{
				$childusername=$checkuser->child1_username;
			}
			if($checkmoney)
			{
				
				if($status=='active')
				{
					//this is to make  child who where born by creator to be creation manager here vcm will be updated on triangle
					
					
					DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
						
					])
					->update([
						
						'triangle_status'=>'split',
						'triangle_parents'=>'',
					   
						
					]);
				///
				DB::table('triangle_grands')
					->where([
						'child1_username'=>$childusername,
						'triangle_status'=>'built',
					])
					->update([
					
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						
						//'btc_child1money'=>$btc_childmoney,
						//'childintern_wallet'=>$int_wallet,
					]);
				
				
				///
				
				
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						
						
					]);
				DB::table('users')
					->where([
						'username'=>$childusername,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						
						
					]);
					
					//this to Update creator page too;to be profile
					DB::table('users')
						->where([
							'username'=>$triangle_parents,
						])
						->update([
							'platform'=>'sbvprofile',
						]);
					
					
				}
				else if($status=='second_triange'){
					
					
					DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
					])
					->update([
						
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						
						
					]);
				///
				DB::table('triangle_grands')
					->where([
						'child1_username'=>$childusername,
						'triangle_status'=>'built',
					])
					->update([
					
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						
					]);
				
				
				
				
				
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						
					]);
				DB::table('users')
					->where([
						'username'=>$childusername,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',//change
						'platform'=>'sbvanotherchild',
						
					]);
					DB::table('users')
						->where([
							'username'=>$triangle_parents,
						])
						->update([
							'status'=>'active',
							'platform'=>'sbvprofile',
							
						]);
				}
				///calculate vcm and country manager money
				
				
				////
				
			}
			
		}
				
				
				
					
	}
	
	public function test(){
	
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	  echo $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	$money=$api_money-0.0002;//ukuyemo network fees
		echo"<br>";
		echo $money;
		
		//$block_io->withdraw_from_addresses(array('amounts' => 0.0004, 'from_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => '1GdRZn4Es5kv92YwYh2PDeGtrdpSM6mF4S'));
		
	}
	public function done()
	{
	
	}
	
	public function childgrand_activated(Request $request){
			///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		////////////////////////////////////////////////////////////////
		
		//here child grand is investing on triangle
 $int_wallet=$request->input('int_wallet');	
		$creator_username=$request->input('creator_username');
	    $triangle_parents=$request->input('triangle_parents');
		 $bitcoin_address=$request->input('bitcoin_address');
		 $child_money=$request->input('child_money');
		$btc_childmoney=$child_money/$zar;  
		
			//save child details in users tables
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			
			///'platform'=>'sbvanotherchild',//this will be  activated through Api
			 'child_money'=>$child_money,//
			 'btc_childmoney'=>$btc_childmoney,
			 'bitcoin_address'=>$bitcoin_address,
			'internal_wallet'=>$int_wallet
		
		]
		 
		 );
		
		
		
	}
	public function reinvest(Request $request){
			///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		
		
		

		////////////////////////////////////////////////////////////////
		
       $creator_money=$request->input('creator_money');
       
	   $btc_childmoney=$creator_money/$zar;   
		
		//$usernames=$request->input('usernames');
		$creator_username=$request->input('creator_username');
		DB::table('users')
			->where([
				'username'=>$creator_username,
			])
			->update([
				'platform'=>'sbvanotherchild',
				'child_money'=>$creator_money,//
			    'btc_childmoney'=>$btc_childmoney,
			]);
		//after updating platform it will update again triangle status to be close("just to close that triangle)
		DB::table('triangle_grands')
			->where([
				'creator_username'=>$creator_username,
			])
			->update([
				'triangle_status'=>'close',
				'creator_values'=>0,
			]);
		
		
	}
	public function checkusername(){
		
			if (Auth::check()) {
    // The user is logged in...
			//$username = Auth::username();
			//$users=DB::select("select *from triangle_grands where child1_username='$username'");
				$username = Auth::user()->username;
				$users=DB::select("select *from triangle_grands where child1_username='$username' and triangle_status='built'");
			//$users=DB::select("select *from users where username='$username'");
			if($users){
			//$profile='complete';
			//return response()->json(array('profile'=>$profile),200);
			return response()->json(array('users'=>$users),200);
		}
		else
		{
			$profile='incomplete';
			return response()->json(array('profile'=>$profile),200);
		}
				
}

	}
	public function checkstatus(){
		 // The user is logged in...
			//$username = Auth::username();
			//$users=DB::select("select *from triangle_grands where child1_username='$username'");
				$username = Auth::user()->username;
				$users=DB::select("select *from triangle_grands where child1_username='$username'");
			//$users=DB::select("select *from users where username='$username'");
		foreach($users as $user)
		{
			$creatorname=$user->creator_username;
		}
		$status=DB::select("select *from users where username='$creatorname'");
			if($status){
			//$profile='complete';
			//return response()->json(array('profile'=>$profile),200);
			return response()->json(array('status'=>$status),200);
		}
		else
		{
			$profile='incomplete';
			return response()->json(array('profile'=>$profile),200);
		}
				

	}
	public function getsbvtriangle(){
		///here is to find creator values when triangle split
			if (Auth::check()) {
    //////////////////////////////////////////////API
				
				$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
				
				
				
////////////////////////////////////////////////////////////////////				
				
				$username = Auth::user()->username;
				$getsbvtriangle=DB::select("select *from triangle_grands where creator_username='$username' and triangle_status='split' and creator_values!=0");
			foreach($getsbvtriangle as $money)
			{
				$zar_amount=$money->creator_values;
			}
				$btc_money=$zar_amount/$zar;
			if($getsbvtriangle){
			
			return response()->json(array('getsbvtriangle'=>$getsbvtriangle,'btc_money'=>$btc_money,'zar'=>$zar),200);
		}
		else
		{
			$profile='incomplete';
			return response()->json(array('profile'=>$profile),200);
		}
				
}

	}
	public function getcountervcm(){
		///here is to find creator values when triangle split
			if (Auth::check()) {
    
				$username = Auth::user()->username;
				$getcountervcm=DB::select("SELECT count(vcm) as vcmcounter from triangle_grands where (triangle_status ='split' or triangle_status ='close') and creator_username='$username'");
			
			if($getcountervcm){
			$sum=DB::select("SELECT sum(vcm) as sum from triangle_grands where vcm =1000 and creator_username='$username'");
			return response()->json(array('getcountervcm'=>$getcountervcm,'sum'=>$sum),200);
		}
		else
		{
			$profile='incomplete';
			return response()->json(array('profile'=>$profile),200);
		}
				
}

	}
	
	public function check_reg_charge(){ //check payment of reg charge payment----
	
		
	$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	 // $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	//echo $checkbalance;	
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			//$btc_charge=Auth::btc_charge();
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			$moneytr=$api_money-0.0002;
		$user=DB::select("select *from users where id='$id' and platform='none' and btc_charge!=0 and btc_charge<='$api_money'");
			
		$checkpayed=DB::select("select *from users where id='$id' and platform='none'");
			foreach($checkpayed as $checked)
			{
				$btc_charge=$checked->btc_charge;
			}
			if($user)
			{
				
			echo"echo update status";
			DB::table('users')
				->where('id',$id)
			    ->update([
					'platform'=>'creator_activated',
					'status'=>'active'
					
				]);
				
				/////////take this Money and add to main wallet /////////////////
				$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				/////////take this Money and add to main wallet /////////////////
			
			}
			else{
			return response()->json(array('btc_charge'=>$btc_charge,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet),200);
	
	
			}
		}
		else{
					}				
					
	}
	public function check_pay()
	{
		//tips is to take money on api - btc_charge on database this will give us money we have in database
		
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	 // $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	//echo $checkbalance;	
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			
			///every single column without loop
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			$btc_charge=$single->btc_charge;
			$btc_childmoney=$single->btc_childmoney;
			
			///every single column without loop
			////////a///////////////////////////////////////////////////////////////
			///api get money located from our wallet/////////////////////////////
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			
			////////////////////////////////////////////////////////////////////////////
			$moneytr=$api_money-0.0002;
			
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			
			/////////////////////////////////////////////////////////////////////
			
			
		//$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney<='$invest_money'");
			$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney!=0 and btc_childmoney<='$invest_money'");
			
		
			if($user)
			{
				//echo"full paid";
				
				//echo"echo update status";
				DB::table('users')
					->where('id',$id)
				    ->update([
						'platform'=>'sbvanotherchild'
						
					]);
				/////////take this Money and add to main wallet /////////////////
				$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				/////////take this Money and add to main wallet /////////////////
			}
			else{
			return response()->json(array('btc_childmoney'=>$btc_childmoney,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet,'btc_charge'=>$btc_charge),200);
	//
	//
				echo"insufficient money";
			}
		}
		else{
					}				
    	
	}
	//////////////////////////////////////////////////////////////CHILD CHECK////////////////////////////////
	public function check_childrecharge()
	{
			
	$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	 // $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	//echo $checkbalance;	
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			//$btc_charge=Auth::btc_charge();
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			//////////////////////////////////////////////////////
			$moneytr=$api_money-0.0002;
			
			//////////////////////////////////////////////////////////
		$user=DB::select("select *from users where id='$id' and platform='child_grand' and btc_charge!=0 and btc_charge<='$api_money'");
			
		$checkpayed=DB::select("select *from users where id='$id' and platform='child_grand'");
			foreach($checkpayed as $checked)
			{
				$btc_charge=$checked->btc_charge;
			}
			if($user)
			{
				
			//echo"echo update status";
			DB::table('users')
				->where('id',$id)
			    ->update([
					'platform'=>'childgrand_activated',
					'status'=>'active'
					
				]);
			////////////////////////////////////////////////////////////////////
				
				$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				
				
				
				///////////////////////////////////////////////////
			}
			else{
			return response()->json(array('btc_charge'=>$btc_charge,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet),200);
	
	
			}
		}
		else{
					}	
	}
	
	
	
	public function check_childpaye()
	{
			//tips is to take money on api - btc_charge on database this will give us money we have in database
		
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	 // $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	//echo $checkbalance;	
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			
			///every single column without loop
			///$single = DB::table('users')->where('id', $id)->first();
			
			
			$singles=DB::select("select *from users where id='$id'");
			foreach($singles as $single)
			{
			$int_wallet=$single->internal_wallet;
			$internal_wallet=$single->internal_wallet;
			$btc_charge=$single->btc_charge;
			$btc_childmoney=$single->btc_childmoney;
			$status=$single->status;
			$creator_username=$single->username; 
			$bitcoin_address=$single->bitcoin_address;
			$child_money=$single->child_money;
			}
			
			
			//just this  that is username(creator_username) on users table to help me to extract my code in easy way
			
			/////////////////////////////////suspicious code/////////////////////////////////
			
			
			$triangle=DB::select("select *from triangle_grands where child1_username='$creator_username' and triangle_status='built'");
				foreach($triangle as $triangles)
				{
					$triangle_parents=$triangles->triangle_parents;
				}
			
			/////////////////////////////////suspicious code/////////////////////////////////
			
			
			
			
			///every single column without loop
			////////a///////////////////////////////////////////////////////////////
			///api get money located from our wallet/////////////////////////////
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			
			////////////////////////////////////////////////////////////////////////////
			
			$moneytr=$api_money-0.0002;
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			
			/////////////////////////////////////////////////////////////////////
			
			
		//$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney<='$invest_money'");
			$user=DB::select("select *from users where id='$id' and platform='childgrand_activated' and btc_childmoney!=0 and btc_childmoney<='$invest_money'");
			
		
			if($user)
			{
				///////////////////////////////////////////////////////////update status code////////////////////
				
				//$int_wallet=$request->input('int_wallet');	
		//$creator_username=$request->input('creator_username');
	   // $triangle_parents=$request->input('triangle_parents');
		 //$bitcoin_address=$request->input('bitcoin_address');
		 //$child_money=$request->input('child_money');
		//$btc_childmoney=$child_money/60000;  
		$checkone=DB::select("select *from triangle_grands where creator_username='$triangle_parents' and child1_money=0 and child_number=1 and triangle_status='built' and child1_username='$creator_username'");
		//$status=$request->input('status');
		$counter=DB::table('triangle_grands')
		 ->where([
			     'creator_username'=>$triangle_parents,
			     'child1_money'=>0,
			      'triangle_status'=>'built',
		 ])
		 ->count('child1_username');
		
		
		echo $counter;
		if($counter==2)
		{
			DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
					])
					->update([
						'child1_money'=>$child_money,
						'btc_child1money'=>$btc_childmoney,
						'childintern_wallet'=>$int_wallet,
					]);
				DB::table('users')
					->where([
						'username'=>$creator_username,
						
					])
					->update([
						
						'platform'=>'child1_invested',
						'bitcoin_address'=>$bitcoin_address,
						'btc_childmoney'=>$btc_childmoney,
						
					]);
			//save child details in users tables
			//update creator platform in users table
		}
		else if($counter==1 and $checkone){
			DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
					])
					->update([
						'child1_money'=>$child_money,
						'btc_child1money'=>$btc_childmoney,
						'childintern_wallet'=>$int_wallet,
						
					]);
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						
						'platform'=>'child1_invested',
						'bitcoin_address'=>$bitcoin_address,
						'btc_childmoney'=>$btc_childmoney,
						
					]);
			//save child details in users tables
			//update creator platform in users table
		}
		else if($counter==1)
		{
			$checkmoney=DB::select("select * from triangle_grands where creator_username='$triangle_parents' and triangle_status='built' and child1_money!=0");
			foreach($checkmoney as $checkuser)
			{
				$childusername=$checkuser->child1_username;
			}
			if($checkmoney)
			{
				
				if($status=='active')
				{
					//this is to make  child who where born by creator to be creation manager here vcm will be updated on triangle
					$vcmtotal=$child_money*3;
					$total=$vcmtotal-1000;
					$creator_values=($total*60)/100;
					$country_manager=($total*40)/100;
					
					DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
						
					])
					->update([
						'child1_money'=>$child_money,
						'triangle_status'=>'split',
						'triangle_parents'=>'',
					    'btc_child1money'=>$btc_childmoney,
						'childintern_wallet'=>$int_wallet,
						
					]);
				///
				DB::table('triangle_grands')
					->where([
						'child1_username'=>$childusername,
						'triangle_status'=>'built',
					])
					->update([
					
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						'creator_values'=>$creator_values,
						'country_manager'=>$country_manager,
						'vcm'=>1000,
						//'btc_child1money'=>$btc_childmoney,
						//'childintern_wallet'=>$int_wallet,
					]);
				
				
				///
				
				
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						'bitcoin_address'=>$bitcoin_address,
						'btc_childmoney'=>$btc_childmoney,
						
					]);
				DB::table('users')
					->where([
						'username'=>$childusername,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						'btc_childmoney'=>$btc_childmoney,
						
					]);
					
					//this to Update creator page too;to be profile
					DB::table('users')
						->where([
							'username'=>$triangle_parents,
						])
						->update([
							'platform'=>'sbvprofile',
						]);
					
					
				}
				else if($status=='second_triange'){
					//here is to restrict second triangle not to be value creation Manager on first time
					$vcmtotal=$child_money*3;
					$total=$vcmtotal-1000;
					$creator_values=($total*60)/100;
					//$country_manager=($total*40)/100;
					$twochild=$child_money*2;
					$country_managers=$twochild-$creator_values;
					
					DB::table('triangle_grands')
					->where([
						'child1_username'=>$creator_username,
						'triangle_status'=>'built',
					])
					->update([
						'child1_money'=>$child_money,
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						'btc_child1money'=>$btc_childmoney,
						'childintern_wallet'=>$int_wallet,
						
					]);
				///
				DB::table('triangle_grands')
					->where([
						'child1_username'=>$childusername,
						'triangle_status'=>'built',
					])
					->update([
					
						'triangle_status'=>'split',
						'triangle_parents'=>'',
						'creator_values'=>$creator_values,
						'country_manager'=>$country_managers,
						//'vcm'=>1000,//without this VCM
						'btc_child1money'=>$btc_childmoney,
						'childintern_wallet'=>$int_wallet,
					]);
				
				
				///
				
				
				DB::table('users')
					->where([
						'username'=>$creator_username,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',
						'platform'=>'sbvanotherchild',
						'bitcoin_address'=>$bitcoin_address,
						'btc_childmoney'=>$btc_childmoney,
					]);
				DB::table('users')
					->where([
						'username'=>$childusername,
					])
					->update([
						'status'=>'second_triange',
						//'platform'=>'child_trianglesplit',//change
						'platform'=>'sbvanotherchild',
						'btc_childmoney'=>$btc_childmoney,
					]);
					DB::table('users')
						->where([
							'username'=>$triangle_parents,
						])
						->update([
							'status'=>'active',
							'platform'=>'sbvprofile',
							'btc_childmoney'=>$btc_childmoney,
						]);
				}
				///calculate vcm and country manager money
				
				
				////
				
			}
			
		}
			//save child details in users tables
		
				
				/////////////////////////////////////////////////////////////////////////////////////////////
				
				$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				/////////////////////////////////////////////////////////////////////////////////////////////
			}
			else{
			return response()->json(array('btc_childmoney'=>$btc_childmoney,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet,'btc_charge'=>$btc_charge),200);
	//
	//
				echo"insufficient money";
			}
		}
		else{
					}				
    	
	}
	
	////////////////////////////////////////////////////////////////CHILD CHECK//////////////////////////////
	public function creator_withdraw(Request $request){//creator will have bility to withdraw or vcm
		///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		////////////////////////////////////////////////////////////////
		
		
		
		$creator_username=$request->input('creator_username');
		$int_wallet=$request->input('int_wallet');
		$bitcoin_address=$request->input('bitcoin_address');
		$creator_money=$request->input('creator_money');
		$btc_money=$creator_money/$zar;
		$today = date("Y-m-d H:i:s"); 
		//$creator_username="kebine";
		DB::table('users')
			->where('username',$creator_username)
		    ->update([
				'platform'=>'creator_activated',
			]);
		    
			DB::table('triangle_grands')
			->where([
				'creator_username'=>$creator_username,
			])
			->update([
				'triangle_status'=>'close',
				'creator_values'=>0,
			]);
		
		DB::table('withdraws')
				 ->insert([
					 'username'=>$creator_username,
					 'internal_wallet'=>$int_wallet,
					 'bitcoin_address'=>$bitcoin_address,
					 'withdraw_amount'=>$creator_money,
					 'btc_withdraw'=>$btc_money,
					 'created_at'=>$today
				 ]);
		
		$block_io->withdraw_from_addresses(array('amounts' =>$btc_money, 'from_addresses' =>'3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => $bitcoin_address));
	}
	
	
	public function adfirstWithdraw(Request $request){
		///////////////////////////////////////////////////////
		
		///exchange API///
		
		
		
			$btc="https://api.cryptonator.com/api/ticker/btc-usd";
		$btc_convert=file_get_contents($btc);
		$btc_decode=json_decode($btc_convert);
		 $btcusd=$btc_decode->ticker->price;
		//print_r($btc_decode);
		$url="http://api.fixer.io/latest?base=USD";
		$test=file_get_contents($url);
		
		$decode=json_decode($test);
	$usdzar=$decode->rates->ZAR;
		$zar=$btcusd*$usdzar;
		////////////////////////////////////////////////////////////////
		
		$creator_username=$request->input('creator_username');
		$int_wallet=$request->input('int_wallet');
		$bitcoin_address=$request->input('bitcoin_address');
		$creator_money=$request->input('creator_money');
		$btc_money=$creator_money/$zar;
		$today = date("Y-m-d H:i:s"); 
		
		//$sum=DB::table('triangle_grands')
//			->sum('country_manager');
		// update where sum of country_manager=mftWithdraw
			 //echo "hello";
			 DB::table('withdraws')
				 ->insert([
					 'username'=>$creator_username,
					 'internal_wallet'=>$int_wallet,
					 'bitcoin_address'=>$bitcoin_address,
					 'withdraw_amount'=>$creator_money,
					 'btc_withdraw'=>$btc_money,
					 'created_at'=>$today
				 ]);
		//hano ndashyiramo code ivugango if  update successfuly then  withdraw otherwise
		DB::table('triangle_grands')
			
			->update([
				'country_manager'=>'0',
			]);
		//API withdraw
		//$block_io->withdraw_from_addresses(array('amounts' => 0.0004, 'from_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => '1GdRZn4Es5kv92YwYh2PDeGtrdpSM6mF4S'));
		$block_io->withdraw_from_addresses(array('amounts' =>$btc_money, 'from_addresses' =>'3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => $bitcoin_address));
	}
}
////

//creator external wallet 

///