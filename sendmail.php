<?php
require 'class.phpmailer.php';
$name	=	$_REQUEST['name'];
$email	=	$_REQUEST['email'];
$order_number	=	$_REQUEST['order_number'];
$message	=	$_REQUEST['message'];

$error	=	"";
if($name == ""){
	$error	.=	"Please fill name\n";
}

if($email == ""){
	$error	.=	"Please fill email\n";
}

if($order_number == ""){
	$error	.=	"Please fill order number\n";
}

if($message == ""){
	$error	.=	"Please fill message\n";
}


if($error!=""){

	echo $error;
	
}else{
	//mail
	
		$to = "services@twt2pay.com";
				$subject = "Customer Support Request";
				  $message = "<html>" .
				"<head>" .
				" <title>Twt2Pay:Customer Support</title>".
				"</head>" .
				"<body>" .
				"There are the information of order-" .
				"<br><br>" .
				"Name : ".$name.
				"<br><br>" .
				"Email : ".$email.
				"<br><br>" .
				"Order No. : ".$order_number.
				"<br><br>" .
				"Message : ".$message.
				"<br><br>" .												
				"</body>" .
				"</html>";
				
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
				$headers .= 'From: Twt2Pay Support <services@twy2pay.com>' . "\r\n";
				////Write mail function below///////////
				//mail($to,$subject,$message,$headers);
		
				
	try {
			  		$to_email = $to;
			  		$mail = new PHPMailer(true); //New instance, with exceptions enabled
			  	
			  		$body = $message;
					
			  		$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
			  	
			  		$mail->IsSMTP();                           // tell the class to use SMTP
			  		$mail->SMTPAuth   = true;                  // enable SMTP authentication
			  		$mail->Port       = 25;                    // set the SMTP server port
			  		$mail->Host       = "twt2pay.com"; // SMTP server
			  		$mail->Username   = "smtp@twt2pay.com";     // SMTP server username
			  		$mail->Password   = "qwerty12";            // SMTP server password
			  	
			  		$mail->AddReplyTo('services@twt2pay.com','Twt2Pay');
			  	
			  		$mail->From       = 'services@twt2pay.com';
			  		$mail->FromName   = 'Twt2Pay';
			  	
			  	
			  		$mail->AddAddress($to_email);
			  	
			  		$mail->Subject  = $subject;
			  	
			  		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			  		$mail->WordWrap   = 80; // set word wrap
			  	
			  		$mail->MsgHTML($body);
			  	
			  		$mail->IsHTML(true); // send as HTML
			  	
			  		$mail->Send();
			  		$msg = 'Message has been sent.';
			  	} catch (phpmailerException $e) {
			  		$msg = $e->errorMessage();
			  	}	

	echo $msg;
}

?>