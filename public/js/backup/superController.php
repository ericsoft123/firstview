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

class superController extends Controller
{
    //
	public function createsuper(Request $request) //this code is to create super users
	{
		$super_creatorusername=$request->input('super_creatorusername');
		//$super_creatorusername="test";
		$super_creatormoney=$request->input('supercreator_money');
		$super_creatorexternwallet=$request->input('super_creatorexternwallet');
		$super_creatorinternwallet=$request->input('super_creatorinternwallet');
		
		
		
		/////////////////////////////////////////////////
			$checkv=DB::select("select *from triangle_grands where creator_username='$super_creatorusername' and triangle_status='split' and creator_values>='$super_creatormoney'");
		if($checkv)
		{
			if($super_creatormoney>=9300)
			{
				DB::update("
			
			UPDATE 
        triangle_grands AS r 
    JOIN
        ( SELECT   id, 
                   SUM(`creator_values`) AS sum_money
          FROM     triangle_grands
          WHERE    creator_username = '$super_creatorusername' and triangle_status='split'
          GROUP BY id
        ) AS grp
       ON  
           grp.id = r.id 
SET 
       r.creator_values = grp.sum_money-'$super_creatormoney'
WHERE 
       r.creator_username = '$super_creatorusername' and
	   r.triangle_status='split'
			
			");
			///////////////////after succeed///////////////////////
					$check=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_trianglestatus='built'");
				
		if(!$check)//this is to avoid inserting twice users
		{
			DB::table("super_triangles")
				->insert([
					"super_creatorusername"=>$super_creatorusername,
					"super_creatormoney"=>$super_creatormoney,
					"super_creatorinternwallet"=>$super_creatorinternwallet,
					"super_creatorexternwallet"=>$super_creatorexternwallet,
					"super_platform"=>'super_creatoractivate'
				]);
		}
	
			////////////////////////////////////////////////////////////
				$errors=0;
return response()->json(array('errors'=>$errors),200);	
			
			//////////////////////////////////////////////////////
			}
			$errors=1;
return response()->json(array('errors'=>$errors),200);			
			
				
		}
		
		$errors=2;
return response()->json(array('errors'=>$errors),200);
		
		
		
		
		//////////////////////////////////////////////////////////////////////
	
		
	///////////////////////////////////////////////////////////////////////////////
	}
	public function test(){
		DB::table("super_triangles")
				->insert([
					//"supercreator_username"=>$supercreator_username,
					"super_creatormoney"=>"hello"
					//"supercreator_externwallet"=>$supercreator_externwallet
				]);
	}
	public function adfirstchild(Request $request){
		$super_creatorusername=$request->input('super_creatorusername');
		$super_child1cell=$request->input('super_child3cell');
      		$super_child1email=$request->input('super_child3email');
		$address_country=$request->input('address-country3');
		
		$username1=str_random(5);
//		
      	$password1=str_random(8);
//			
//			
//			
//			
	$super_child1username=substr($super_child1email,0,strrpos($super_child1email,'@'))."".$username1;
		
		$today = date("Y-m-d H:i:s"); 

		$check=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_trianglestatus='build' and super_child1username='none' ");
	if(!$check){
			
			
			
			//
			
			
			
			
			
			
			
			
			
			/////////////////
				$getmoney=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername'");
		foreach($getmoney as $getmoneydata)
		{
			$super_creatormoney=$getmoneydata->super_creatormoney;
		}
		
			DB::table("super_triangles")
			->where('super_creatorusername',$super_creatorusername)
			->update([
				
				'super_child1username'=>$super_child1username,
				'super_child1cell'=>$super_child1cell,
				'super_child1email'=>$super_child1email,
				'super_child1money'=>$super_creatormoney,
				'super_childnumber'=>1,
				'super_platform'=>'adnextchild',
				'created_at'=>$today
				
				
			]);
			
			///////////////////////////
			
			$user=new User([
			//this is to initialize model and input type
			'name'=>$username1,
			'username'=>$super_child1username,
			'address-country'=>$address_country, 
			'cell'=>$super_child1cell,
			'email'=>$super_child1email,
			'password'=>bcrypt($password1),
			'password_decode'=>$password1,
			'status'=>'inactive',
			'platform'=>'super_childgrand',
			//
			//'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
			
			
			
			///////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		
		
		
		
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
$mail->addAddress($super_child1email);   // Add a recipient
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

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
                         <p align='center'>username:<span style='color: blue'>$super_child1username</span></p>
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			
			
			
		}
		else{
		
		}
		
		
		
		
		
	}
	public function adnextchild(Request $request){
		////////////////////////////////////////////////////////////////
		
		$super_creatorusername=$request->input('super_creatorusername');
		$super_child1cell=$request->input('super_child3cell');
      		$super_child1email=$request->input('super_child3email');
		$address_country=$request->input('address-country3');
		
		$username1=str_random(5);
//		
      	$password1=str_random(8);
//			
//			
//			
//			
	$super_child1username=substr($super_child1email,0,strrpos($super_child1email,'@'))."".$username1;
		
		$today = date("Y-m-d H:i:s"); 

		$check=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_trianglestatus='build' and super_child2username='none' ");
	if(!$check){
			
			
			
			//
			
			
			
			
			
			
			
			
			
			/////////////////
				$getmoney=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername'");
		foreach($getmoney as $getmoneydata)
		{
			$super_creatormoney=$getmoneydata->super_creatormoney;
		}
		
			DB::table("super_triangles")
			->where('super_creatorusername',$super_creatorusername)
			->update([
				
				'super_child2username'=>$super_child1username,
				'super_child2cell'=>$super_child1cell,
				'super_child2email'=>$super_child1email,
				'super_child2money'=>$super_creatormoney,
				'super_childnumber'=>2,
				'super_platform'=>'super_filled',
				'created_at'=>$today
				
				
			]);
			
			///////////////////////////
			
			$user=new User([
			//this is to initialize model and input type
			'name'=>$username1,
			'username'=>$super_child1username,
			'address-country'=>$address_country, 
			'cell'=>$super_child1cell,
			'email'=>$super_child1email,
			'password'=>bcrypt($password1),
			'password_decode'=>$password1,
			'status'=>'inactive',
			'platform'=>'super_childgrand',
			//
			//'child_money'=>$creator_money,
			
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
			
			
			
			
			
		////////////////////////////////////////////////////////////////////////////////
		
		
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
$mail->addAddress($super_child1email);   // Add a recipient
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
                         <p align='center'>username:<span style='color: blue'>$super_child1username</span></p>
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
		
		
		
		
		/////////////////////////////////////////////////////////////////////////////////////////
			
			
		}
		else{
		
		}
		
		
		
		////////////////////////////////////////////////////////////////////
		
		
	}
	public function super_creatorcheckpay(){
		
		
	}
	public function upgrade(Request $request)
	{
		$upgradeusername=$request->input('upgradeusername');
		
		$check=DB::select("select *from super_triangles where super_creatorusername='$upgradeusername' and super_trianglestatus='built'");
		if($check)
		{ 
		$resultcheck="data";
		return response()->json(array('resultcheck'=>$resultcheck),200);
			
		}
		
	}
	public function super_triangle(Request $request){
		$super_username=$request->input('super_username');
		
		$supers=DB::select("select *from super_triangles where super_creatorusername='$super_username' and (super_trianglestatus='built' or super_trianglestatus='split') ");
		$child1=DB::select("select *from super_triangles where super_child1username='$super_username' and super_trianglestatus='built'");
		$child2=DB::select("select *from super_triangles where super_child2username='$super_username' and super_trianglestatus='built'");
		//$child3=DB::select("select *from super_triangles where uper_creatorusername='$super_username' and super_trianglestatus='split' and super_platform= ");
		
		if($supers)
		{
			$supersi='creator';
			return response()->json(array('supersi'=>$supersi,'supers'=>$supers),200);
		}
		else if($child1)
		{
			$supersi='child1';
			return response()->json(array('supersi'=>$supersi,'child1'=>$child1),200);
		}
		else if($child2)
		{
			$supersi='child2';
			return response()->json(array('supersi'=>$supersi,'child2'=>$child2),200);
		}
		else{
			$message="Eish! seems That You are not in Super triangle Try To split one triangle or Get an invitation";
			return response()->json(array('message'=>$message),200);
		}
		
		
	}
	public function backupsuper_triangle(Request $request){
		$super_username=$request->input('super_username');
		
		$supers=DB::select("select *from super_triangles where super_creatorusername='$super_username'");
		$child1=DB::select("select *from super_triangles where super_child1username='$super_username'");
		$child2=DB::select("select *from super_triangles where super_child2username='$super_username'");
		
		if($supers)
		{
			return response()->json(array('supers'=>$supers),200);
		}
		else if($child1)
		{
			return response()->json(array('child1'=>$child1),200);
		}
		else if($child2)
		{
			return response()->json(array('child2'=>$child2),200);
		}
		else{
			$message="Eish! seems That You are not in Super triangle Try To split one triangle or Get an invitation";
			return response()->json(array('message'=>$message),200);
		}
		
		
	}
	public function checktriangle()
	{
		$super_username=$request->input('super_username');
		
		$supers=DB::select("select *from super_triangles where super_creatorusername='$super_username'");
		$child1=DB::select("select *from super_triangles where super_child1username='$super_username'");
		$child2=DB::select("select *from super_triangles where super_child2username='$super_username'");
		
		if($supers)
		{
			return response()->json(array('supers'=>'creator'),200);
		}
		else if($child1)
		{
			return response()->json(array('child1'=>"child1"),200);
		}
		else if($child2)
		{
			return response()->json(array('child2'=>$child2),200);
		}
		else{
			echo "none";
		}
		
	}
	public function super_childactivate(){
		//idea iziruta zose nukuvugango ndakora code izajya i monitoring ko child1btc irimo na child2btc irimo yazibonamo just igahita i spliting table ikana updating buri mu child status nukuvugango iyi code igomba kuba iri run buri gihe umwe yaba child1 azaba ari kwishyura cg child2 ari kwishyura
		
		
		
		//if tuzasanga muri triangle child1 ariwe wishyuye mbere ubwo tuza executing child2(triangle izaba split kuri child2)
		//if tuzasanga muri triangle child2 ariwe wishyuye mbere ubwo tuza executing child1(triangle izaba split kuri child1)
		
		
		///idea nshobora  gu creating buri child ikaba activated ukwayo igihe namaze gu checking ko ntanumwe urishyura muri database  noneho in case umwe yakwishyura then akaba ariho nzajya nashyiramo code zo kureba uwishyuye mbere
		
		
		
		//////////////////////////////////////////
		
		///hano nda checking both  child1btc='none' hano child1 or child2 ashobora kwishyura triangle ntibe split
		
		
		//////////////////////////////////////////////////
		
			//example let us take 100000 as example money
			$checkchild1=DB::select("select *from super_triangles where super_child1username='toto' and super_child1btcmoney!='none' and super_trianglestatus='built'");
		$checkchild2=DB::select("select *from super_triangles where super_child2username='kaba' and super_child2btcmoney!='none' and super_trianglestatus='built'");
		if($checkchild1){
			///split code
			$tot=10000*3;
			$money=10000;
			$creator_money=($money*2)+(($money*20)/100);
			$country_manager=$tot-$creator_money;
			
			DB::table('super_triangles')
				->where('super_creatorusername','kebine')
				->update([
					'super_creatorvalues'=>$creator_money,
					'country_manager'=>$country_manager
				]);
		}
		else if($checkchild2){
			$tot=10000*3;
			$money=10000;
			$creator_money=($money*2)+(($money*20)/100);
			$country_manager=$tot-$creator_money;
			
			DB::table('super_triangles')
				->where('super_creatorusername','kebine')
				->update([
					'super_creatorvalues'=>$creator_money,
					'country_manager'=>$country_manager
				]);
		}
	}
	public function super_monitorsplit(){
		//igomba kugira authentication check muburyo bwo gutuma izajya iba run mugihe cyayo bitewe numu user
		///get creator_username,child1_username;child2_username
		if (Auth::check()) {
    // The user is logged in...
			//$username = Auth::username();
			//$users=DB::select("select *from triangle_grands where child1_username='$username'");
				$username = Auth::user()->username;
			$getsuper=DB::select("select *from super_triangles where (super_child1username='$username' or super_child2username='$username') and  super_trianglestatus='built'");
			
			
			foreach($getsuper as $getdata)
			{
				$super_creatorusername=$getdata->super_creatorusername;
				$super_child1username=$getdata->super_child1username;
				$super_child2username=$getdata->super_child2username;
				$super_creatormoney=$getdata->super_creatormoney;
			}
			
		
		$checksplit1=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_child1btcmoney!='none' and super_child2btcmoney!='none' and super_trianglestatus='built' and super_child1platform='super_child1filled' and super_child2platform='super_child2filled' and super_creatorstatus='creator'");
			
			$checksplit2=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_child1btcmoney!='none' and super_child2btcmoney!='none' and super_trianglestatus='built' and super_child1platform='super_child1filled' and super_child2platform='super_child2filled' and super_creatorstatus='childcreator'");
		If($checksplit1)
		{
			//split this triangle
		//$check1=DB::select("select *from super_triangles where super_creatorusername='$super_child1username' and super_trianglestatus='built'");
			//if(!$check1)
			//{
			$super_creatorvalues1=($super_creatormoney*2)+(($super_creatormoney)*20/100);
			$country_manager=($super_creatormoney*3)-$super_creatorvalues1;
				DB::table("super_triangles")
					->insert([
						'super_creatorusername'=>$super_child1username,
						'super_creatormoney'=>$super_creatormoney,
						'super_creatorbtcmoney'=>'none',
						'super_platform'=>'super_creatoractivate',
						'super_creatorstatus'=>'childcreator'
						
					]);
		//	}
			DB::table("super_triangles")
					->insert([
						'super_creatorusername'=>$super_child2username,
						'super_creatormoney'=>$super_creatormoney,
						'super_creatorbtcmoney'=>'none',
						'super_platform'=>'super_creatoractivate',
						'super_creatorstatus'=>'childcreator'
						
					]);
			
			///update super_creatorusername
			DB::table("super_triangles")
				->where([
					'super_creatorusername'=>$super_creatorusername,
					'super_trianglestatus'=>'built'
				])
				->update([
					'super_platform'=>'super_profile',
					'super_trianglestatus'=>'split',
					'super_creatorvalues'=>$super_creatorvalues1,
					'country_manager'=>$country_manager
					
					
				]);
		//	}
		}
			else if($checksplit2){
				//////////////////////////////////////
				
				//{
				$super_creatorvalues2=($super_creatormoney*2)+(($super_creatormoney)*20/100);
				DB::table("super_triangles")
					->insert([
						'super_creatorusername'=>$super_child1username,
						'super_creatormoney'=>$super_creatormoney,
						'super_creatorbtcmoney'=>'none',
						'super_platform'=>'super_creatoractivate',
						'super_creatorstatus'=>'childcreator'
						
					]);
		//	}
			DB::table("super_triangles")
					->insert([
						'super_creatorusername'=>$super_child2username,
						'super_creatormoney'=>$super_creatormoney,
						'super_creatorbtcmoney'=>'none',
						'super_platform'=>'super_creatoractivate',
						'super_creatorstatus'=>'childcreator'
						
					]);
			
			///update super_creatorusername
			DB::table("super_triangles")
				->where([
					'super_creatorusername'=>$super_creatorusername,
					'super_trianglestatus'=>'built'
				])
				->update([
					'super_platform'=>'super_profile',
					'super_trianglestatus'=>'split',
					'super_creatorvalues'=>$super_creatorvalues2
					
				]);
				
				
				
				
				
				
				
				
				//////////////////////////////////
			}
		}
		
	}
	public function super_child1converted(Request $request){
		////API money converted Required
		
		
		//////////////////////////////////////////////////  i disable this because of network connection
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
		
		
		////////////////////////////////////////////////////
		$super_creatorusername=$request->input('super_creatorusername');
		$super_creatormoney=$request->input('supercreator_money');
		$super_creatorexternwallet=$request->input('super_creatorexternwallet');
		$super_creatorinternwallet=$request->input('super_creatorinternwallet');
		$super_child1btcmoney=$super_creatormoney/$zar+0.0012;
		
		$check=DB::select("select *from super_triangles where super_child1username='$super_creatorusername' and super_trianglestatus='built'");
		if($check)
		{
			
		DB::table('super_triangles')
				->where([
					['super_child1username',$super_creatorusername],
					['super_trianglestatus','built']
				])
				->update([
				   'super_child1btcmoney'=>$super_child1btcmoney,
					'super_child1money'=>$super_creatormoney,
					'super_child1internwallet'=>$super_creatorinternwallet,
					'super_creatorexternwallet'=>$super_creatorexternwallet
				]);
		
			return response()->json(array('super_child1btcmoney'=>$super_child1btcmoney,'super_creatorinternwallet'=>$super_creatorinternwallet),200);
			
				
		}
	}
	public function super_child2converted(Request $request){
		
		//////////////////////////////////////////////////
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
		
		
		////////////////////////////////////////////////////
	////////////////////////////////////////////////////
		$super_creatorusername=$request->input('super_creatorusername');
		$super_creatormoney=$request->input('supercreator_money');
		$super_creatorexternwallet=$request->input('super_creatorexternwallet');
		$super_creatorinternwallet=$request->input('super_creatorinternwallet');
		$super_child2btcmoney=$super_creatormoney/$zar+0.0012;
		
		$check=DB::select("select *from super_triangles where super_child2username='$super_creatorusername' and super_trianglestatus='built'");
		if($check)
		{
			
		DB::table('super_triangles')
				->where([
					['super_child2username',$super_creatorusername],
					['super_trianglestatus','built']
				])
				->update([
					'super_child2btcmoney'=>$super_child2btcmoney,
					'super_child2money'=>$super_creatormoney,
					'super_child2internwallet'=>$super_creatorinternwallet,
					'super_creatorexternwallet'=>$super_creatorexternwallet
				]);
		
			return response()->json(array('super_child2btcmoney'=>$super_child2btcmoney,'super_creatorinternwallet'=>$super_creatorinternwallet),200);
			
				
		}
	else{
		
	}
	}
	public function super_child1activated(){
		////////////check api parts//////////////////////// check btc only based on super_btcmoney
		
		
		/// then  activated super_child1platform
		//after succeed call monitor split function
		
	}
	public function super_child2activated(){
		
		////////////check api parts////////////////////////
		
		
		/// then  activated super_child2platform
		//after succeed call monitor split function
		
		
	}
		public function activate_superchildgrand(Request $request)
	{
		///////////////////////////////////////////////////////
		
		///exchange API///
		
		//there is no network
		//
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
		
		$checks=DB::select("select *from users where username='$creator_username' and platform='super_childgrand' and internal_wallet='none'");
		$check2=DB::select("select *from users where username='$creator_username' and platform='super_childgrand' and internal_wallet!='none'");
		
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
			$btc_charge=200/$zar+0.0012;//there is no network
			
//		
		
		DB::table('users')
           ->where('username',$creator_username)
         ->update(
		 [
			//this is to initialize model and input type
			
			//'status'=>'active',
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
			   [ 'platform','super_childgrand'],
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
	public function supercheck_childrecharge()
	{
			
	$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
	
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
		$user=DB::select("select *from users where id='$id' and platform='super_childgrand' and btc_charge!=0 and btc_charge<='$api_money'");
			
		$checkpayed=DB::select("select *from users where id='$id' and platform='super_childgrand'");
			foreach($checkpayed as $checked)
			{
				$btc_charge=$checked->btc_charge;
				$childname=$checked->username;
			}
			if($user)
			{
			/////////////////////////////////////
				
				$checkchild1=DB::select("select *from super_triangles where super_child1username='$childname' and super_trianglestatus='built'");
				$checkchild2=DB::select("select *from super_triangles where super_child2username='$childname' and super_trianglestatus='built'");
				if($checkchild1)
				{
					DB::table("super_triangles")
						->where('super_child1username',$childname)
						->update([
							'super_child1platform'=>'super_child1activate',
						]);
				}
				else if($checkchild2){
					DB::table("super_triangles")
						->where('super_child2username',$childname)
						->update([
							'super_child2platform'=>'super_child2activate',
						]);
				}
				
				
				
				
			/////////////////////////////////////////////	
				
				
			//echo"echo update status";
			DB::table('users')
				->where('id',$id)
			    ->update([
					'platform'=>'superchildgrand_activated',
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

	public function super_checkchild1pay(){
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
		
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			$super_child1username = Auth::user()->username;
			
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
			///
			
			$supertriangles=DB::select("select *from super_triangles where super_child1username='$super_child1username' and super_trianglestatus='built'");
			foreach($supertriangles as $supertriangle)
			{
				$super_child1btcmoney=$supertriangle->super_child1btcmoney;
			}
				
			///
			
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			
			////////////////////////////////////////////////////////////////////////////
			
			$moneytr=$api_money-0.0002;
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			$user=DB::select("select *from super_triangles where super_child1username='$super_child1username' and super_child1platform='super_child1activate' and super_child1btcmoney!=0 and super_child1btcmoney<='$invest_money'");
			if($user)
			{
				DB::table("super_triangles")
					->where([
						['super_child1username',$super_child1username],
						['super_trianglestatus','built']
					])
					->update([
						'super_child1platform'=>'super_child1filled',
					]);
			
			}
			else{
				return response()->json(array('super_child1btcmoney'=>$super_child1btcmoney,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet,'btc_charge'=>$btc_charge),200);
			}
			
		}
	}
		public function super_checkchild2pay(){
			$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
		
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			$super_child2username = Auth::user()->username;
			
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
			///
			
			$supertriangles=DB::select("select *from super_triangles where super_child2username='$super_child2username' and super_trianglestatus='built'");
			foreach($supertriangles as $supertriangle)
			{
				$super_child2btcmoney=$supertriangle->super_child2btcmoney;
			}
				
			///
			
			 $api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
			
			////////////////////////////////////////////////////////////////////////////
			
			$moneytr=$api_money-0.0002;
			///////////////////////////////////////////////////////////////////
			//get Money located on this Addresss is to take money located on api - btc_charge
			
			$invest_money=$api_money-$btc_charge;
			$user=DB::select("select *from super_triangles where super_child2username='$super_child2username' and super_child2platform='super_child2activate' and super_child2btcmoney!=0 and super_child2btcmoney<='$invest_money'");
			if($user)
			{
				DB::table("super_triangles")
					->where([
						['super_child2username',$super_child2username],
						['super_trianglestatus','built']
					])
					->update([
						'super_child2platform'=>'super_child2filled',
					]);
				
			}
			else{
				return response()->json(array('super_child2btcmoney'=>$super_child2btcmoney,'api_money'=>$api_money,'internal_wallet'=>$internal_wallet,'btc_charge'=>$btc_charge),200);
			}
			
		}
	}
	public function super_checkcreatorpay(){
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);
	//	if (Auth::check()) {
//    
				$username = Auth::user()->username;
			
			$checks=DB::select ("select *from triangle_grands where creator_username='$username' and triangle_status='split' and creator_values!=0");
		
			foreach($user as $users)
			{
				$internal_wallet=$users->creaintern_wallet;
				$btc_creamoney=$users->btc_creamoney;
			}
		
			
				$api_money=$block_io->get_address_balance(array('addresses' =>$internal_wallet))->data->available_balance;
		$moneytr=$api_money-0.0002;
			if($api_money>$btc_creamoney)
			{
				//////////////////////////////////////////////////  i disable this because of network connection
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
		
		
		
		////////////////////////////////////////////////////
				$convertm=$moneytr*$zar;
				DB::update("update  triangle_grands set creator_values=creator_values+'$convertm' where creator_username='kebine' and triangle_status='split' and creator_values!=0");
				echo"hello";
				///////////////////////////////withdraw/////////////////
				$block_io->withdraw_from_addresses(array('amounts' =>$moneytr, 'from_addresses' =>$internal_wallet, 'to_addresses' => '3PA1RShtf9kp66ktjEtvCyn7FM8W1Q2R5V'));
				
				/////////////////////////////////////////////////////////////
			}
			else{
			
			}
			
		
	}
	public function getsuper_triangle()//this is to get data on profile page
	{
		if (Auth::check()) {
    
				$username = Auth::user()->username;
			$supertriangles=DB::select("select *from super_triangles where super_trianglestatus='split'");
		foreach($supertriangles as $supertriangle)
		{
			echo $super_creatorvalues=$supertriangle->super_creatorvalues;
			
		}
			
		}
	}

	public function super_reinvest(Request $request){
				
		////////////////////////////
		
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
			
       $super_creatormoney=$request->input('supercreator_money');
       
	   //$btc_childmoney=$creator_money/$zar;   
		
		//$usernames=$request->input('usernames');
		$super_creatorusername=$request->input('super_creatorusername');
		
		
		/////////////////////////////////////////
		
		$checkv=DB::select("select *from super_triangles where super_creatorusername='$super_creatorusername' and super_trianglestatus='split' and super_creatorvalues>='$super_creatormoney'");
		if($checkv)
		{
			if($super_creatormoney>=9300)
			{
				DB::update("
			
			UPDATE 
        super_triangles AS r 
    JOIN
        ( SELECT   id, 
                   SUM(`super_creatorvalues`) AS sum_money
          FROM     super_triangles
          WHERE    super_creatorusername = '$super_creatorusername' and  super_trianglestatus='split'
          GROUP BY id
        ) AS grp
       ON  
           grp.id = r.id 
SET 
       r.super_creatorvalues = grp.sum_money-'$super_creatormoney'
WHERE 
       r.super_creatorusername = '$super_creatorusername' and
	   r.super_trianglestatus='split'
			
			");
			///////////////////after succeed///////////////////////
			//DB::table('users')
//			->where([
//				'username'=>$creator_username,
//			])
//			->update([
//				'platform'=>'sbvanotherchild',
//				'child_money'=>$creator_money,//
//			    'btc_childmoney'=>$btc_childmoney,
//			]);
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
		
	
}
