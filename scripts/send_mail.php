<?php
	$subject = "A message from the Internauts contact form"; 
	$message = "$message";
	$name = "$name";
	$mail_from = "$email"; 
	
	$header = "from: $name <$mail_from>";
	$to ='cricketw@WeAreTheInternauts.com'

	$send_contact = mail($to,$subject,$message,$header);

	if($send_contact){
		echo "We've recieved your contact information";
	} else {
		echo "ERROR";
	}
?>