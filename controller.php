<?php

	foreach (glob("include/*.php") as $filename)
	{
		require_once $filename;
	}
	
	session_start();
	
	$db = new DataBase($db_host,$db_name,$db_user,$db_password);
	$feedback = new FeedBack;
	
	if (!empty($_POST)) 
	{
		if (isset($_POST['FORM_CONTROLLER']) && strlen($_POST['FORM_CONTROLLER'])>0) 
		{
			if (isset($controllers[$_POST['FORM_CONTROLLER']]) && strlen($controllers[$_POST['FORM_CONTROLLER']])) 
			{
				$controller_file = 'controllers/'.$controllers[$_POST['FORM_CONTROLLER']];
				if (file_exists($controller_file)) 
				{
					require_once($controller_file);
				} else 
				{
					$feedback->putMessage('Controller file not present');
				}
			} else 
			{
				$feedback->putMessage('Controller not defined');
			}
		} else 
		{
			$feedback->putMessage('Controller not specified in POST');
		}
	}
	
	require_once('templates/templates.php');
	
?>
