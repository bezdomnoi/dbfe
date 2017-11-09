<?php

	$uc = new UserControl($db);
	
	if ($_POST['FORM_CONTROLLER']=='LOGIN' && !isset($_SESSION['user'])) { 
	
		$req_email = $_POST['user_email'];
		$pswd1 = $_POST['user_password1'];
		
		$post_back = false;
		
		if (strlen($req_email)>0)
		{
			$user = $uc->verifyUser($req_email,$pswd1);
			
			if (is_array($user) && $user['user_active'])
			{
				$_SESSION['user']=$user;
				$feedback->putMessage('Login successful');
				header('Location: '.'index.php');
			} else {
				$feedback->putMessage('No active user with that name and password');
				$post_back = true;
			}
		} else {
			$feedback->putMessage('Please enter email to log-in');
		}
	} elseif ($_POST['FORM_CONTROLLER']=='LOGOUT') {
		unset($_SESSION['user']);
	}
	
?>