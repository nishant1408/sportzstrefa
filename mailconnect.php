<?php

		$mail->IsSMTP();	
		//$mail->SMTPDebug  = 2;  		//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '587';								//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'Sportzstrefa@gmail.com';					//Sets SMTP username
		$mail->Password = 'sportzstrefa7980068583';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"				//Sets the From email address for the message
		$mail->FromName = 'SportzStrefa';	
?>