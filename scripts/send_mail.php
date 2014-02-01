<?php
	$subject = "A message from the Internauts contact form"; 
	$message = $_POST['message'];
	$message = wordwrap($message, 70);
	$name = $_POST['name'];
	$mail_from = $_POST['email']; 
	
	$header = "from: $name <$mail_from>";
	$to ='cricketw@WeAreTheInternauts.com';
	$send_contact = mail($to,$subject,$message,$header);

	if($send_contact == true){
		echo "We've recieved your contact information";
	} else {
		echo "ERROR";
	}
?>