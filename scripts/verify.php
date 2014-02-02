<?php
session_start();

function spamcheck($field)
{
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
	if(filter_var($field, FILTER_VALIDATE_EMAIL))
	{
		return TRUE;
	} else {
		return FALSE;
	}
}


if($_POST['s3capcha'] == $_SESSION['s3capcha'] && $_POST['s3capcha'] != '') {
    unset($_SESSION['s3capcha']);
    echo 'capcha success!/n';
    if (isset($_REQUEST['email']))
	{
		//check if the email address is invalid
		$mailcheck = spamcheck($_REQUEST['email']);
		if ($mailcheck==FALSE)
		{
	    	echo "Invalid input";
	    } else {
	    	//send email
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
				echo "SEND ERROR";
			}
	    }
	} else {
		echo "please fill in all fields";
	}
} else {
    echo 'capcha fail';
}

?>