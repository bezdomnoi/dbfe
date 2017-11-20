<?php
	if (!isset($_SESSION['user'])) {
	
		if (!isset($post_back)) $post_back = false;
?>

<form id="FORM_LOGIN" action="login.php" method="post">
	<fieldset>
		<legend>Log in as user</legend>
		<input type="hidden" name="FORM_CONTROLLER" value="LOGIN"/>
		<label for="user_email">Enter email :</label>
		<input type="email" name="user_email" id="user_email" value="<?php if($post_back) pb('user_email')?>" required /><br>
		<label for="user_password1">Enter password :</label>
		<input type="password" name="user_password1" id="user_password1" onfocus="clearInput(this);" required /><br>
		<input type="submit" value="LOGIN" id="btn_login" class="btn_standard" />
	</fieldset>
</form>

<?php
	}
?>
