<?php
	if (isset($_SESSION['user'])) {
		
		$update = false;
		
		if ($_POST['FORM_CONTROLLER'] == 'USER_UPDATE_SELF') {
			$id = $_SESSION['user']['user_id'];
			$update = true;
			
		} elseif ($_POST['FORM_CONTROLLER'] == 'USER_UPDATE_ADMIN') {
			if ($_SESSION['user']['admin']) {
				$id = $_POST['user_id'];
				$pswd_old = 'admin';
				$update = true;
			} 
		}
		
		if ($update) {
			$uc = new UserControl($db);
			
			$req_email = $_POST['user_email'];
			$req_display = $_POST['user_display'];
			$pswd_old = $_POST['user_password_old'];
			$pswd1 = $_POST['user_password1'];
			$pswd2 = $_POST['user_password2'];
			
			$reload_user = false;
			
			if ($req_email != $_SESSION['user']['user_email']) {
				if (preg_match($email_pattern, $req_email)) {
					if ($uc->isAvailable($req_email)) {
						if ($uc->setEmail($id, $req_email)) {
							$feedback->putMessage('Email updated successfully');
							$reload_user = true;
						} else {
							$feedback->putMessage('Failed to update email');
						}
					} else {
						$feedback->putMessage('New email address is not available.');
					}
				} else {
					$feedback->putMessage('Requested email is not a valid email');
				}
			}
			
			if ($req_display != $_SESSION['user']['user_display']) {
				
				if (strlen($req_display) == 0) $req_display = $req_email;
				
				if ($uc->setDisplay($id, $req_display)) {
					$feedback->putMessage('Display name updated successfully');
					$reload_user = true;
				} else {
					$feedback->putMessage('Failed to update display name');
				}
			}
			
			if (strlen($pswd_old)>0 && strlen($pswd1)>0 && strlen($pswd2)>0) {
				if ($pswd1==$pswd2) {
					if ($uc->verifyUser($req_email,$pswd_old) || $_SESSION['user']['admin'])
					{
						if (preg_match($pswd_security_pattern, $pswd1))
						{
							if($uc->setPassword($id, $pswd1)) {
								$feedback->putMessage('Password updated successfully');
								$reload_user = true; // not really necessary
							} else {
								$feedback->putMessage('Failed to update password');
							}
						} else {
							$feedback->putMessage($pswd_security_legend);			
						}
					} else {
						$feedback->putMessage('Supplied current password is not correct');
					}
				} else {
					
					$feedback->putMessage('New password and confirmation do not match');
				}
			}
			
			if ($reload_user) {
				if (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'] && $_POST['FORM_CONTROLLER'] == 'USER_UPDATE_ADMIN')  {
					$loaded_user = $uc->getUserById($id);
				} else {
					$_SESSION['user'] = $uc->getUserById($id);
				}
			}
		}
	}
?>
