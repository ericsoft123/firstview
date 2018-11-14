<?php

namespace App\Http\Controllers;

use App\User;
use App\Triangle_grand;
use App\BlockIo;
use Illuminate\Http\Request;
use DB;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Mail;
use File;
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
		//if money available on block.io address(internal wallet)-btc charge(availbe on users table)>=(1000 convert on btc on that day)
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
	   $btc_childmoney=$creator_money/$zar+0.0012; 
		//$btc_childmoney=$creator_money/80000;//no network
		
		//This the child1_money equivalent to btc that money must not be<R1000 here i took reference that one btc is equal 600000
	

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

$mail->setFrom('excellentia1ltd@gmail.com', 'SBV');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'SBV');
$mail->addAddress($child1_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
$bodyContent ="<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class=''>
    <table border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <span class='preheader'></span>
            <table class='main'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <p>Hi </p>
                        <hr style='color:black'>
                        <p style=' font-size: 20px;
        font-weight: 250;
        
        text-transform: capitalize; }'>SBV</p>
                        <p>Welcome to Sbv.</p>
                        <p>Please login to your account using the details below.</p>
                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                          <tbody>
                            <tr>
                              <td align='left'>
                                <table border='0' cellpadding='0' cellspacing='0'>
                                  <tbody>
                                   <p align='center'><a href='http://superbitcoinvalue.com' target='_blank'>Visit Our Website  </a> </p>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p align='center' style='color: brown'>Users Details:</p>
                         <p align='center'>username:<span style='color: blue'>$child1_username</span></p>
                         <p align='center'>Password:<span style='color: blue'>$password1</span></p>
                        <p>Regards,</p>
                        <p>Team SBV</p>
                        <p>Questions? Visit our website</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class='footer'>
              <table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  
                </tr>
                
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>";


		//$bodyContent ='<p><a href="http://localhost:8000/confirm?email='.$email.'&&code='.$str.'">Click Here for confirmation</a></p>' ;

//$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'Email confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   // echo 'Message has been sent';
	
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

$mail->setFrom('excellentia1ltd@gmail.com', 'SBV');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'SBV');
$mail->addAddress($child1_email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent ="<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }

      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        background-color: #f6f6f6;
        width: 100%; }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }

      a {
        color: #3498db;
        text-decoration: underline; }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }

      .btn-primary table td {
        background-color: #3498db; }

      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }

      .first {
        margin-top: 0; }

      .align-center {
        text-align: center; }

      .align-right {
        text-align: right; }

      .align-left {
        text-align: left; }

      .clear {
        clear: both; }

      .mt0 {
        margin-top: 0; }

      .mb0 {
        margin-bottom: 0; }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }

      .powered-by a {
        text-decoration: none; }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }

    </style>
  </head>
  <body class=''>
    <table border='0' cellpadding='0' cellspacing='0' class='body'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>

            <!-- START CENTERED WHITE CONTAINER -->
            <span class='preheader'></span>
            <table class='main'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <p>Hi </p>
                        <hr style='color:black'>
                        <p style=' font-size: 20px;
        font-weight: 250;
        
        text-transform: capitalize; }'>SBV</p>
                        <p>Welcome to Sbv.</p>
                        <p>Please login to your account using the details below.</p>
                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary'>
                          <tbody>
                            <tr>
                              <td align='left'>
                                <table border='0' cellpadding='0' cellspacing='0'>
                                  <tbody>
                                   <p align='center'><a href='http://superbitcoinvalue.com' target='_blank'>Visit Our Website  </a> </p>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p align='center' style='color: brown'>Users Details:</p>
                         <p align='center'>username:<span style='color: blue'>$child1_username</span></p>
                         <p align='center'>Password:<span style='color: blue'>$password1</span></p>
                        <p>Regards,</p>
                        <p>Team SBV</p>
                        <p>Questions? Visit our website</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class='footer'>
              <table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  
                </tr>
                
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>";

		//$bodyContent ='<p><a href="http://localhost:8000/confirm?email='.$email.'&&code='.$str.'">Click Here for confirmation</a></p>' ;

//$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'Email confirmation';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
	
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
		$check2=DB::select("select *from users where username='$creator_username' and platform='none' and internal_wallet!='none'");
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
		$btc_charge=200/$zar+0.0012;  //money of  registration converted to bitcoin here i take referance 1btc=60000 that equal to 0.004BTC=200
		
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
			else if($check2){
			
			$btc_charge=200/$zar+0.0012;
			
			DB::table('users')
           ->where([
			  [ 'username',$creator_username],
			   [ 'platform','none'],
			    
			  
			   
		   ])
			
         ->update(
		 [
			//this is to initialize model and input type
			
			
			
			 'bitcoin_address'=>$bitcoin_address,
			
			 'btc_charge'=>$btc_charge,
			 
			 ///
		
		]
		 
		 );
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
		$check2=DB::select("select *from users where username='$creator_username' and platform='child_grand' and internal_wallet!='none'");
		
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
			
			$btc_charge=200/$zar+0.0012;
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
		else if($check2){
			
			$btc_charge=200/$zar+0.0012;
			
			DB::table('users')
           ->where([
			  [ 'username',$creator_username],
			   [ 'platform','child_grand'],
			    [ 'status','inactive'],
			  
			   
		   ])
			
         ->update(
		 [
			//this is to initialize model and input type
			
			
			
			 'bitcoin_address'=>$bitcoin_address,
			
			 'btc_charge'=>$btc_charge,
			 
			 ///
		
		]
		 
		 );
		}
		
		////
			
	}
	
	public function test(){
		//this will be deprecated
	require_once 'php/BlockIo.php';
		
		//include("php/block_io.php");
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
$test= $block_io->get_balance();
////		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet		echo $block_io->get_balance()->status;
//		//$block_io->get_address_by(array('label' => 'mobiru'));
//		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
//		
//	 // echo $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
//	//$money=$api_money-0.0002;//ukuyemo network fees
//		//echo"<br>";
//		//echo $money;
	//echo $block_io->get_balance()->status;
		//$block_io->withdraw_from_addresses(array('amounts' => 0.0004, 'from_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => '1GdRZn4Es5kv92YwYh2PDeGtrdpSM6mF4S'));
		
	}
	public function done()
	{
	//$unconfirmed="https://api.smartbit.com.au/v1/blockchain/address/32tcGYcLMUrj1jgqgYwpYMs3P49inoSjSC";
//		$get_unconfirmed=file_get_contents($unconfirmed);
//		$decode=json_decode($get_unconfirmed);
//		echo $test=$decode->address->unconfirmed->received;
//		if($test>0)
//		{
//			echo"data is unconfirmed";
//		}
		
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
		$btc_childmoney=$child_money/$zar+0.0012;  
		
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
       
	   $btc_childmoney=$creator_money/$zar+0.0012;   
		
		//$usernames=$request->input('usernames');
		$creator_username=$request->input('creator_username');
		
		
		
		/////////////////////////////////////////
		
		$checkv=DB::select("select *from triangle_grands where creator_username='$creator_username' and triangle_status='split' and creator_values>='$creator_money'");
		if($checkv)
		{
			if($creator_money>=500)
			{
				DB::update("
			
			UPDATE 
        triangle_grands AS r 
    JOIN
        ( SELECT   id, 
                   SUM(`creator_values`) AS sum_money
          FROM     triangle_grands
          WHERE    creator_username = '$creator_username' and triangle_status='split'
          GROUP BY id
        ) AS grp
       ON  
           grp.id = r.id 
SET 
       r.creator_values = grp.sum_money-'$creator_money'
WHERE 
       r.creator_username = '$creator_username' and
	   r.triangle_status='split'
			
			");
			///////////////////after succeed///////////////////////
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
//		DB::table('triangle_grands')
//			->where([
//				'creator_username'=>$creator_username,
//			])
//			->update([
//				'triangle_status'=>'close',
//				'creator_values'=>0,
//			]);
			
				$errors=0;
return response()->json(array('errors'=>$errors),200);	
			
			//////////////////////////////////////////////////////
			}
			$errors=1;
return response()->json(array('errors'=>$errors),200);			
			
				
		}
		
		$errors=2;
return response()->json(array('errors'=>$errors),200);	
		
		
		
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
				$btc_money=$zar_amount/$zar+0.0012;
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
	
	public function check_reg_charge(){ 
	
		
	
//$test= $block_io->get_balance();
//		//$block_io->get_new_address(array('label' => 'mubiru'))->data->address; //internal wallet
//		///echo $block_io->get_balance()->status;
		//$block_io->get_address_by(array('label' => 'mobiru'));
		//echo $block_io->get_address_by(array('label' => 'mobiru'))->status;
		
	 // $api_money=$block_io->get_address_balance(array('addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->available_balance;
	//echo $checkbalance;	
		if (Auth::check()) {
			
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
    // The user is logged in...
			$id = Auth::id();
			//$btc_charge=Auth::btc_charge();
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			 
			 $available=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			$pending=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->pending_received_balance;
			
			$api_money=$available+$pending;
		
			//$estimate=$block_io->get_network_fee_estimate(array('amounts' => $api_money, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->estimated_network_fee;
		//$moneytr=$api_money-0.001060;
			//$moneytr=$api_money-$estimate;
			
		$user=DB::select("select *from users where id='$id' and platform='none' and btc_charge!=0 and btc_charge<=$api_money");
			//$user=DB::select("select *from users where id='$id' and platform='none' and btc_charge!=0 and btc_charge<=$moneytr");
			
		$checkpayed=DB::select("select *from users where id='$id' and platform='none'");
			foreach($checkpayed as $checked)
			{
				$btc_charge=$checked->btc_charge;
			}
			if($user)
			{
			
			
				
					
			DB::table('users')
				->where('id',$id)
			    ->update([
					'platform'=>'creator_activated',
					'status'=>'active'
					
				]);	
				
			
			//$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				
			
				
				
			
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
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
			///every single column without loop
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			$btc_charge=$single->btc_charge;
			$btc_childmoney=$single->btc_childmoney;
			
			///every single column without loop
			////////a///////////////////////////////////////////////////////////////
			///api get money located from our wallet/////////////////////////////
			$available=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			$pending=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->pending_received_balance;
			
			$api_money=$available+$pending;
			
		
		//$moneytr=$api_money-0.001060;
			//$moneytr=$api_money-$estimate;
			////////////////////////////////////////////////////////////////////////////
		
			
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			
			/////////////////////////////////////////////////////////////////////
			
			//$estimate=$block_io->get_network_fee_estimate(array('amounts' => $api_money, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'))->data->estimated_network_fee;
		//$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney<='$invest_money'");
			$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney!=0 and btc_childmoney<=$invest_money");
			
		
			if($user)
			{
				//echo"full paid";
				
				//echo"echo update status";
				DB::table('users')
					->where('id',$id)
				    ->update([
						'platform'=>'sbvanotherchild'
						
					]);
				
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
			
				$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
			//$btc_charge=Auth::btc_charge();
			$single = DB::table('users')->where('id', $id)->first();
			$internal_wallet=$single->internal_wallet;
			
			//////////////////////////////////////////////////////
			
			$available=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			$pending=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->pending_received_balance;
			
			$api_money=$available+$pending;
			
			//////////////////////////////////////////////////////////
		$user=DB::select("select *from users where id='$id' and platform='child_grand' and btc_charge!=0 and btc_charge<=$api_money");
			
		$checkpayed=DB::select("select *from users where id='$id' and platform='child_grand'");
			foreach($checkpayed as $checked)
			{
				$btc_charge=$checked->btc_charge;
			}
			if($user)
			{
				////////////////////////////////////////////////////////////////////
				
				//$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				
				
				
				///////////////////////////////////////////////////
			//echo"echo update status";
			DB::table('users')
				->where('id',$id)
			    ->update([
					'platform'=>'childgrand_activated',
					'status'=>'active'
					
				]);
			
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
			
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
			
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
			 $available=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			$pending=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->pending_received_balance;
			
			$api_money=$available+$pending;
			
			////////////////////////////////////////////////////////////////////////////
			
			
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			
			/////////////////////////////////////////////////////////////////////
			
			
		//$user=DB::select("select *from users where id='$id' and platform='creator_activated' and btc_childmoney<='$invest_money'");
			$user=DB::select("select *from users where id='$id' and platform='childgrand_activated' and btc_childmoney!=0 and btc_childmoney<=$invest_money");
			
		
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
		$btc_money=$creator_money/$zar+0.0012;
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
		$btc_money=$creator_money/$zar+0.0012;
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
		///////////////////////////////////////////////
			$block_io->withdraw_from_addresses(array('amounts' =>$btc_money, 'from_addresses' =>'3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => $bitcoin_address));
		
		///////////////////////////////////////////////////
		DB::table('triangle_grands')
			
			->update([
				'country_manager'=>'0',
			]);
		//API withdraw
		//$block_io->withdraw_from_addresses(array('amounts' => 0.0004, 'from_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V', 'to_addresses' => '1GdRZn4Es5kv92YwYh2PDeGtrdpSM6mF4S'));
	
	}
	public function adregwithdraw(){// admin registration withdraw
		
	
	}
	public function checkreinvest()
	{
		if (Auth::check()) {
			
			$username=Auth::user()->username;
			$check=DB::select("select *from users where username='$username' and platform='sbvprofile'");
			if($check)
			{
				$cases=1;
				return response()->json(array('cases'=>$cases),200);
			}
			$cases=2;
				return response()->json(array('cases'=>$cases),200);
		}
		
	}
	///////////////check split
		public function trianglesplit()
	{
		
		
	}
		public function secondsplit()
	{
		
		
	}
}

////

//creator external wallet 

///