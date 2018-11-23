<?php

require 'mailconnect.php';

			//Sets the From name of the message
		$mail->AddAddress($remail, $name);		//Adds a "To" address	//Adds a "Cc" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML				
		$mail->Subject = $subject;				//Sets the Subject of the message
		$mail->Body = $message;				//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$error = '<label class="text-success">Thank you for contacting us</label>';
		}
		else
		{
			$error = '<label class="text-danger">There is an Error</label>';
		}

?>