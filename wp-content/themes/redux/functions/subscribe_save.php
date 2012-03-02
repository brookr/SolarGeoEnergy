<?php 
	if(file_exists('../../../../wp-load.php')) {
		include '../../../../wp-load.php'; 
	} else {
		include '../../../../../wp-load.php'; 
	}
?>

<?php 

// the email
$email = strtolower($_POST['email']);

//if the email is valid
if (eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($email))) 
{
	
	//get all the current emails
	$stack = get_option('tz_subscribed_emails');
	
	//if there are no emails in the database
	if(!$stack)
	{
		//update the option with the first email as an array
		update_option('tz_subscribed_emails', array($email));	
	}
	else
	{
		//if the email already exists in the array
		if(in_array($email, $stack))
		{
			_e("<p class='error'><span class='cross'></span>that email address is already subscribed!</p>", "framework");
		}
		else
		{
			// If there is more than one email, add the new email to the array
			array_push($stack, $email);
			
			//update the option with the new set of emails
			update_option('tz_subscribed_emails', $stack);
			
			//Open subscribers csv file
			$fp = fopen('subscribers.csv', 'w');
			
			//write in a format that CSV intepreters can understand
			foreach($stack as $line)
			{
				$val = explode(",",$line);
				fputcsv($fp, $val);
			}
			
			//close file
			fclose($fp);
			
			_e("<p class='success'><span class='tick'></span>thanks, your address has been added", "framework");
		}
	}
}
else
{
	_e("<p class='error'><span class='cross'></span>please enter a valid email address", "framework");
}

?>