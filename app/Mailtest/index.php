<?php
require 'PHPMailer/PHPMailerAutoload.php';

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

$bodyContent = 'hello keb';
$bodyContent .= '<p>Sent by Eric Kayiranga in CODING TEST(PASSION CODER) ! <b>Email:ericsoft123@gmail.com</b></p>';

$mail->Subject = 'ORDERS DETAILS from USERS CODED BY PASSION CODER';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	// visit our site www.studyofcs.com for more learning
}

?>
