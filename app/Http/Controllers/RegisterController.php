<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User; // this will call user model file
use Mail;
use Auth; // just to make login to test field of database if is equal to field of our login page
use DB;
use PHPMailer\PHPMailer\PHPMailer;

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
    public function emailtest()
    {
        $email = 'ericsoft123@gmail.com';
        $username = '1';
        $password = '1';
        //////////////////////////////////////////////////////////////////////////
        $mail = new PHPMailer();

        $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ),
);
        $mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'server126.web-hosting.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;
        $mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'server126.web-hosting.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'info@nti247.com';          // SMTP username
$mail->Password = '1234bigi'; // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect to

$mail->setFrom('info@nti247.com', 'nti');
        $mail->addReplyTo('info@nti247.com', 'nti');
        $mail->addAddress($email);   // Add a recipient
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = "<html>
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
                        <p> </p>
                        <hr style='color:black'>
                        <p >Dear Customer</p>
                        <p>You have successfully registered with Sbv.</p>
                        
                       
                        
                         <p >username:<span style='color: blue'>$username</span></p>
                         <p >Password:<span style='color: blue'>$password</span></p>
                        <p>To login go to https://superbitcoingrowth.com/</p>
                        <p>Thank you for choosing Sbv .</p>
                        <p>Sbv Adminstration.</p>
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
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            //echo 'Message could not be sent.';
            echo 'Mailer Error: '.$mail->ErrorInfo;
        } else {
            // echo 'Message has been sent';
        }

        ///
        //email
    }

    /*public function createadmin(Request $request){
        $admin_username=$request->input('admin_username');
        $admin_tel=$request->input('admin_tel');
        $admin_email=$request->input('admin_email');
        $admin_paytype=$request->input('admin_paytype');
        $admin_amount=$request->input('admin_amount');


        DB::table('users')
            ->insert([
                'username'=>$admin_username,
                'admin_tel'=>$admin_tel,
                'admin_email'=>$admin_email,
                'admin_paytype'=>$admin_paytype,
                'platform'=>'payme'
            ]);

        $checkuser=DB::select("select *from invests where username='$admin_username' and status='payme'");
        if(!$checkuser){
            $checkinvest=DB::table("invests")
                ->insert([
                    'username'=>$admin_username,
                    'total_amount'=>$admin_amount,
                    'status'=>'payme',
                ]);
            if($checkinvest){
                //send message that data has been inserted successfuly
                $message="admin user has been created successfuly";
                return response()->json(array('message'=>$message),200);
            }
        }
    }*/
    public function getsignup()
    {
        return view('auth.register');
    }

    public function postsignup(Request $request)
    {
        //$this->checkdata_exist();
        $cell = $request->input('cell');
        //$tel=ltrim($cell, '0');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        $name = $request->input('name');
        $namecaps = strtoupper($name);
        //$confirmation_code['data'] = str_random(30);
        $str = str_random(25);

        $this->validate($request, [
            //validation of my form
            'name' => 'required|string|max:255',
            'username' => 'required|max:255|unique:users',
            //'address-country'=>'required',
            'cell' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|confirmed',
            'cell' => 'required|numeric',
        ]);
        $user = new User([
            //this is to initialize model and input type
            'name' => $request->input('name'),

            'username' => $request->input('username'),
            //'address-country'=>$request->input('address-country'),
            //'cell'=>"+27"."".$tel,
            'cell' => $cell,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'password_decode' => $request->input('password'),

            'creator_status' => 'none',

            //'password' => $request->input('password'),
        ]); // load class from user model to call fillable this will initialize table column with input
        $user->save();
        //email

        return redirect()->route('login')->with('status', 'Check your inbox to confirm your registration Email');
    }

    public function postsignin(Request $request)
    {
        //		$users=DB::select('select*from news_articles where reporter_email=:reporter_email',array('reporter_email'=>$email));

        $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
        ]);
        if (Auth::attempt([
            'username' => $request->input('username'), //means if it check username table =to input name them add input name;
            'password' => $request->input('password'),
        ])) {
            //return redirect()->route('read_news');
            return redirect()->route('profile');
        //return view('profile')->with('users',$users);
        } else {
            return redirect()->back()->with('status', 'Please make sure you have account or you have accepted confirmation in your inbox ');
        }
    }

    public function getsignin()
    {
        return view('auth.login');
    }

    public function profile()
    {
        return view('profile');
    }
}
