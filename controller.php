<?php
	// include classes and other files

	foreach (glob("include/*.php") as $filename)
	{
		require_once $filename;
	}
	
	$db = new database($db_host,$db_name,$db_user,$db_password);
		
	// handle POST / GET
	
	// build site
	
	require_once('templates/templates.php');
	

	
?>