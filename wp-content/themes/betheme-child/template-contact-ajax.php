<?php 
/* Template Name: Contact Ajax */

?>

<?php
echo "test";
$to = 'maan.6050@gmail.com';
		$subject = 'Form Submitted Successfully!';
		$message = '<html><head><title>Call me back</title></head><body><p><b>Name:</b> '.$_POST['name'].'</p><p><b>Phone:</b> '.$_POST['phone'].'</p>                      
				</body></html>';
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Site <will@blueorange.digital>\r\n";	
		mail($to, $subject, $message, $headers);
		if(mail($to, $subject, $message, $headers))
		{
		echo "sending mail test";
		}
		else
		{
			 echo "not";
		}

?>