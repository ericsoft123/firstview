<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User; // this will call user model file
use App\Http\Requests;
use App\Http\Controllers\validate;
use Mail;
use Auth;// just to make login to test field of database if is equal to field of our login page
use DB;
use PDF;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\BlockIo;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  public function getsignup()
  {
	  return view('auth.register');
  }
	public function postsignup(Request $request)
	{
		
	
		//$this->checkdata_exist();
		$email=$request->input('email');
		$username=$request->input('username');
		$password=$request->input('password');
		$name=$request->input('name');
		$namecaps=strtoupper($name);
		//$confirmation_code['data'] = str_random(30);
		$str=str_random(25);
		$link=$email."".$str;
		$testi="localhost:8000/confirm?token='.$link";
		$token=$link;
		//localhost:8000/confirm?token=ericsoft123@gmail.comQhU3rnJ5dYji5nkqSJ7hZ7yzm"
		//$url='localhost:8000/confirm?token='.$token;
		
		$this->validate($request,[
			//validation of my form
			'name' => 'required|string|max:255',
            'username' => 'required|max:255|unique:users',
			'address-country'=>'required',
			'cell'=>'required',
			'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed',
			'cell'=>'required|numeric'
			
		]);
		$user=new User([
			//this is to initialize model and input type
			'name'=>$request->input('name'),
			
			'username' => $request->input('username'),
			'address-country'=>$request->input('address-country'),
			'cell'=>$request->input('cell'),
			'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password')),
			'password_decode'=>$request->input('password'),
			
			'creator_status'=>'active'
			
			//'password' => $request->input('password'),
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		
		//email
		
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
$mail->addAddress($email);   // Add a recipient
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
                         <p align='center'>username:<span style='color: blue'>$username</span></p>
                         <p align='center'>Password:<span style='color: blue'>$password</span></p>
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
    //echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   // echo 'Message has been sent';
	
}
		
		///
		//email
		
return redirect()->route('login')->with('status','Check your inbox to confirm your registration Email');
	
	}
	public function postsignin(Request $request)
	{
		
//		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));
		
		$this->validate($request,[
		'username' => 'required',
		'password' => 'required',
		]);
		if(Auth::attempt([
			'username'=>$request->input('username'), //means if it check username table =to input name them add input name;
			'password'=>$request->input('password'),
			
			
		]))
			
		{
			//return redirect()->route('read_news');
			return view('profile');
			//return view('profile')->with('users',$users);
		}
		
	else{
		return redirect()->back()->with('status','Please make sure you have account or you have accepted confirmation in your inbox ');
	}
		
	}
	public function getsignin()
	{
		return view ("auth.login");
	}
	public function confirm()
		
	{
		$token=$_GET['token'];
		//$users=DB::delete('delete from users where token=:token',array('token'=>$token));
//		return redirect()->route('view_newspost');
		$users=DB::update('update users set status=1 where token=:token',array('token'=>$token));
		//return redirect()->route('resetlink')->with('status','confirmation email has been send')->with('token',$token);
		return view ('auth.Newpassword')->with('status','Thank you to register with us Type new password')->with('token',$token);
		//('update news_articles set views_no=views_no+1 where id=:id',array('id'=>$id));
		
	}
	public function pdfall(Request $request){
	//where id=:id',array('id'=>$id)
		$id=$_GET['id'];
		$download='pdfall';
		$news_articles=DB::select('select *from news_articles where id=:id',array('id'=>$id));
		view()->share('news_articles',$news_articles);
		
			
			$pdf=PDF::loadView('pdfall');
			
			return $pdf->download('pdfall');
		
	
		//return view('pdfall');
	}
		public function pdfone(Request $request){
		$news_articles=DB::select('select *from news_articles');
		view()->share('news_articles',$news_articles);
		if($request->has('download')){
			$pdf=PDF::loadView('pdfone');
			return $pdf->download('pdfone');
		
		}
		return view('pdfone');
	}
	public function resetlink(){
		
	}
		public function reset(){
			
			$mail = new PHPMailer;
//variable
       /* $fc_purchased=$_POST['fc'];
		$exchange_rate_fc=$_POST['value'];
		$surch_percentage=$_POST['surch'];
		$amount_fc_purchase=$_POST['foreign'];
		$exchange_zar=$_POST['exchange_zar'];
		$amount_paid_zar=$_POST['tot_paid'];
	    $amount_surch=$_POST['amount_surcharge'];
        $email=$_POST['email'];
        $today = date("Y-m-d H:i:s"); */ 
		

//variable
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

$mail->setFrom('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addReplyTo('excellentia1ltd@gmail.com', 'PASSION CODER');
$mail->addAddress('ericsoft123@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

//$bodyContent = 'hello keb';
//$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'ORDERS DETAILS from USERS CODED BY PASSION CODER';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}

			
 
			
		}
	public function newpassword(Request $request){
		
		$token=$request->input('token');
		$pass=$request->input('password');
		//$password=$request->input('password');
		$password=bcrypt($pass);
		$this->validate($request,[
			
            'password' => 'required|string|min:6|confirmed',
		]);
		$users=DB::update("update users set password='$password',token=0 where token=:token",array('token'=>$token));
		//$users=DB::update("update users set token=0 where token=:token",array('token'=>$token));
		
		
		//if(!$users){
			return redirect()->route('getsignin')->with('status','Thank you. you can use your new password');
			
	//	}
		//return redirect()->back()->with('status','check again')->with('token',$token);
		
	}
	public function getuserdata(){
		$email="ericsoft123@gmail.com";
		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));
		//$users=DB::select('select*from news_articles '); //reporter_email:reporter_email',array('reporter_email'=>$email));
		return $users;
	}
public function autosavecategory()
	{
		
		
	$news_category=new \App\Category([
	'category'=>'Technology'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Science'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'Sport'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Health'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'LifeStyle'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Entertainment'
	]);
	
	$news_category->save();
		$news_category=new \App\Category([
	'category'=>'World'
	]);
	
	$news_category->save();
	$news_category=new \App\Category([
	'category'=>'Others'
	]);
	
	$news_category->save();
	}
	public function checkdata_exist()
	{
		//to check if there is a data in category table
$categories=DB::select('select *from categories');
		$data_exist=DB::select('select *from categories where id=1');
		if(!$data_exist)
		{
			$this->autosavecategory();
			return view('publish')->withCategories($categories);
		}
		else{
			
			return view('publish')->withCategories($categories);
		}
		
		
	}
	public function sendemail_multiple()//This Method is only for Testing Purpose
	{
		
	//	$users=DB::select("select *from subscribes");
//	foreach($users as $user)
//	{
//		$emails[]=$user->email;
//		
//		
//	}
//	//print_r($emails) ;
//			Mail::send('news', [$emails], function($message) use ($emails)
//{    
//    $message->to($emails)->subject('This is test e-mail');    
//});
//var_dump( Mail:: failures());
//exit;
		//$updatelatest=DB::update('update news_articles set latest=0 where latest=latest ORDER by created_at  LIMIT 2');
		//$count=DB::table('news_articles')
//			->where('latest','latest')
//			->orderBy('created_at','desc')
//			->count('latest');
//		echo $count;
		$count=DB::table('news_articles')
			->where('latest','latest')
			->count('latest');
			
			
		echo $count;
		
		//echo $collection = collect($users['email']);
		//$emails = ['ericsoft123@gmail.com', 'kebine123@gmail.com'];
		
	

	}
	public function activate(Request $request){
		$platform=$request->input('platform');
		$values=$request->input('values');
		$bitcoin_address=$request->input('bitcoin_address');
		DB::table('users')
			->update([
				'platform'=>$platform,
				'values'=>$values,
				'bitcoin_address'=>$bitcoin_address,
				
				
			]);
	}
	public function account(){ //this is to check what will display on users account and what will not display on Account (profile page)
//$users=DB::select("select *from users where platform='none'");
//		if($users){
//			$profile='complete';
//			return response()->json(array('profile'=>$profile),200);
//		}
//		else
//		{
//			$profile='incomplete';
//			return response()->json(array('profile'=>$profile),200);
//		}
		
		
		
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			$users=DB::select("select *from users where id='$id'");
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
	public function checklogin()
	{
		if (Auth::check()) {
    // The user is logged in...
			$id = Auth::id();
			$users=DB::select("select *from users where id='$id'");
			
				
}
		
	}
	public function profile(){
		return view('profile');
	}
	public function editprofile(Request $request){
		$usname=$request->input('usname');
		$fname=$request->input('fname');
		$femail=$request->input('femail');
		$fpassword=$request->input('fpassword');
		$fbitcoin=$request->input('fbitcoin');
		
		DB::table('users')
			->where('username',$usname)
			->update([
				'name'=>$fname,
				'email'=>$femail,
				'password'=>bcrypt($fpassword),
				'password_decode'=>$fpassword,
				'bitcoin_address'=>$fbitcoin,
			]);
	}
	public function postadminregister(Request $request)
	{
		$apiKey = "bbb9-9b15-2867-7837";
$version = 2; // API version
$pin = "1234bigi";
$block_io = new BlockIo($apiKey, $pin, $version);

		
		$internal_wallet=$block_io->get_new_address()->data->address;
		
		//$this->checkdata_exist();
		$email=$request->input('email');
		$username=$request->input('username');
		$password=$request->input('password');
		$name=$request->input('name');
		$money_toinvest=$request->input('money_toinvest');
		$namecaps=strtoupper($name);
		//$confirmation_code['data'] = str_random(30);
		$str=str_random(25);
		$link=$email."".$str;
		$testi="localhost:8000/confirm?token='.$link";
		$token=$link;
		//localhost:8000/confirm?token=ericsoft123@gmail.comQhU3rnJ5dYji5nkqSJ7hZ7yzm"
		//$url='localhost:8000/confirm?token='.$token;
		
		$this->validate($request,[
			//validation of my form
			'name' => 'required|string|max:255',
            'username' => 'required|max:255|unique:users',
			'address-country'=>'required',
			'cell'=>'required',
			'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed',
			'money_toinvest'=>'required|integer|min:5500|max:1000000',
			'cell'=>'required|numeric'
			
		]);
		$user=new User([
			//this is to initialize model and input type
			'name'=>$request->input('name'),
			
			'username' => $request->input('username'),
			'address-country'=>$request->input('address-country'),
			'cell'=>$request->input('cell'),
			'email'=>$request->input('email'),
            'password' => bcrypt($request->input('password')),
			'password_decode'=>$request->input('password'),
			
			'creator_status'=>'second_triangle',
			'platform'=>'sbvanotherchild',
			'child_money'=>$request->input('money_toinvest'),
			'internal_wallet'=>$internal_wallet,
			
			//'password' => $request->input('password'),
			
			
			
		]); // load class from user model to call fillable this will initialize table column with input
		$user->save();
		
		//email
		
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
$mail->addAddress($email);   // Add a recipient
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
                         <p align='center'>username:<span style='color: blue'>$username</span></p>
                         <p align='center'>Password:<span style='color: blue'>$password</span></p>
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
    //echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   // echo 'Message has been sent';
	
}
		
		///
		//email
		
return redirect()->route('profile');
	}
}

