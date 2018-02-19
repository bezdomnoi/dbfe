<?php

	// devPrint($db->PDOWithResult('Call getUser(1)'));

	
	$email = 'myemail12@test.com';
	$display = 'mydisplay';
	$password = 'my password';
	$active = true;

	$sql = "Call addUser(:email,:display,:password,:active)";
	
	$password = password_hash($password,PASSWORD_BCRYPT,['cost' => 11]);
	
	$query_params = array(
	  ':email' => $email,
	  ':display' => $display,
	  ':password' => $password,
	  ':active' => (($active == 0) ? 0 : 1)
	);

	devPrint($db->PDOsingleResult($sql,$query_params)['id']);

?>
