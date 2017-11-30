<?php
	if (!isset($_SESSION['user'])) {

		$uc = new UserControl($db);
		
		$req_email = $_POST['user_email'];
		$req_display = $_POST['user_display'];
		$pswd1 = $_POST['user_password1'];
		$pswd2 = $_POST['user_password2'];

		if (!isset($pswd_security_pattern)) $pswd_security_pattern = "/.*/"; // hardcoded fall-back
		
		$post_back = false;
		
		if (strlen($req_email)>0)
		{
			if ($uc->isAvailable($req_email)) 
			{
				if ($pswd1==$pswd2)
				{
					if (preg_match($pswd_security_pattern, $pswd1))
					{
						if (strlen($req_display) == 0) $req_display = $req_email;
						
						$user_added = $uc->addUser($req_email,$req_display,$pswd1,1);
						
						if ($user_added) 
						{
							$feedback->putMessage("User added with ID: ".$user_added);
						}
					} else {
						$feedback->putMessage($pswd_security_legend);
						$post_back = true;			
					}
				} else {
					$feedback->putMessage('Passwords do not match');
					$post_back = true;
				}
			} else {
				$feedback->putMessage('Email address is already registered. Please use password recovery feature if this is your email');
				$post_back = true;
			}
		} else {
			$feedback->putMessage('Email address is mandatory');
			$post_back = true;
		}
	}
?>