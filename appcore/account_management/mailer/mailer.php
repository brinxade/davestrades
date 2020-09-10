<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function dispatch_activation($email,$token)
{
	$mail = new PHPMailer();
															 
	$mail->isSMTP();                                  
	$mail->Host = "smtp.hostinger.in";
	$mail->SMTPAuth = true;                            
	$mail->Username = "info@davestrades.co";                 
	$mail->Password = "@Cyrus#123";                           
	$mail->SMTPSecure = "tls";                           
	$mail->Port = 587;                                   


	$mail->From = "info@davestrades.co";
	$mail->FromName = "Dave's Trades";

	$mail->addAddress($email);

	$mail->addReplyTo("info@davestrades.co", "Reply");

	$mail->isHTML(true);

	$token_href='davestrades.localhost/appcore/account_management/activate.php?token='.$token;
	$mail->Subject = "Dave's Trades - Account Activation";
	$mail->Body = '
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" href="core.css" type="text/css"/>
			</head>
			<body style="font-family:arial;">
				<div align="center"style="font-family:arial;">
					<div style="max-width:800px;margin:0 auto;width:500px;background:#000;overflow:hidden;">
						<div>
							<div style="padding-top:5px;background:#45b649;">
								<h1 style="font-size:2.5em;color:white;">DAVE&apos;S TRADES</h1>
								<hr color="#1aac23"/>
							</div>
							<div style="position:relative;padding:70px 0 0 0;">
								<div>
									<p style="margin:0 auto;max-width:400px;color:white;font-size:16px;">
										Thank you for registring at Dave&apos;s Trades. The fun is just a few clicks and taps away, please click on the button below to activate your account
									</p>
									<a href="'.$token_href.'" style="display:block;max-width:300px;margin:50px auto;text-decoration:none;background:#1aac23;border-radius:10px;color:white;font-weight:bold;padding:20px 30px;font-size:20px;">Activate Account</a>
								</div>
								<br/><br/><br/><br/>
								<div style="width:100%;">
									<p align="center" style="color:white;padding:20px;background:#45b649;margin:0;font-size:16px;">&copy; 2020 Dave&apos;s Trades. Developed by Brinxade.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
		</html>
	';
	
	$mail->AltBody =
	'
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" href="core.css" type="text/css"/>
			</head>
			<body>
				<div align="center"style="font-family:arial;">
					<div style="max-width:800px;margin:0 auto;width:500px;background:#efe;border-radius:10px;overflow:hidden;">
						<div>
							<div style="padding-top:5px;background:#1aac23;">
								<h1 style="font-size:2.5em;color:white;">DAVE&apos;S TRADES</h1>
								<hr color="#1aac23"/>
							</div>
							<div style="position:relative;padding:70px 0 0 0;">
								<div style="padding:40px;">
									<p style="margin:0 auto;max-width:400px;padding:40px;">
										Thank you for registring at Dave&apos;s Trades. The fun is just a few clicks and taps away, please click on the button below to activate your account
									</p>
									<a href="'.$token_href.'" style="display:block;max-width:300px;margin:50px auto;text-decoration:none;background:#1aac23;border-radius:10px;color:white;font-weight:bold;padding:20px 30px;font-size:20px;">Activate Account</a>
								</div>
								<br/><br/><br/><br/>
								<div style="width:100%;">
									<p align="center" style="color:white;padding:20px;background:#1aac23;margin:0;">&copy; 2020 Dave&apos;s Trades. Developed by Brinxade.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
		</html>
	';

	if(!$mail->send()) 
	{
			//echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else 
	{
			//echo "Message has been sent successfully";
			return TRUE;
	}
}
?>