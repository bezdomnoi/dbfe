<?php
	if (!isset($_SESSION['user'])) {
	
		if (!isset($post_back)) $post_back = false;
		if (!isset($pswd_security_pattern)) $pswd_security_pattern = ".*"; // fallback
?>
<form id="FORM_USER_REGISTER" action="register.php" method="post" onsubmit="return checkFields(this);">
	<fieldset>
		<legend>Register a new user</legend>
		<input type="hidden" name="FORM_CONTROLLER" value="NEW_USER"/>
		<label for="user_email">Enter email :</label>
		<input type="email" name="user_email" id="user_email" value="<?php if($post_back) pb('user_email')?>" required pattern=".+@.+\..+" /><br>
		<label for="user_display">Enter display name :</label>
		<input type="text" name="user_display" id="user_display" value="<?php if($post_back) pb('user_display')?>" /><br>
		<label for="user_password1">Enter password :</label>
		<input type="password" name="user_password1" id="user_password1" onfocus="clearInput(this);" required /><br>
		<label for="user_password2">Confirm password :</label>
		<input type="password" name="user_password2" id="user_password2" onfocus="clearInput(this);" required /><br>
		<input type="submit" value="REGISTER" id="btn_register" class="btn_standard" />
	</fieldset>
</form>

<?php
	}
?>
