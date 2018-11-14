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

?>
