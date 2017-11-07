<?php


	foreach (glob("include/*.php") as $filename)
	{
		require_once $filename;
	}
	

	$db = new database($db_host,$db_name,$db_user,$db_password);
	
	$sql = 'SELECT * FROM bsug_user_authorisation';

	
	devPrint($db->PDOSelect($sql));
	
	
	// handle POST / GET
	
	// Build header, menu
	
	//load template $page
	

	
?>