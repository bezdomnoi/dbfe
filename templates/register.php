<?php
	

?>

<form id="REGISTER_USER" action="register.php" method="post" onsubmit="return fieldsMatch('user_password1','user_password2');">
	<fieldset>
		<legend>Register a new user</legend>
		<input type="hidden" name="FORM_CONTROLLER" value="NEW_USER"/>
		<label for="user_email">Enter email :</label>
		<input type="email" name="user_email" id="user_email" pattern=".+@.+\..+"/><br>
		<label for="user_display">Enter display name :</label>
		<input type="text" name="user_display" id="user_display"/><br>
		<label for="user_password1">Enter password :</label>
		<input type="password" name="user_password1" id="user_password1" onclick="clearInput(this);"/><br>
		<label for="user_password2">Confirm password :</label>
		<input type="password" name="user_password2" id="user_password2" onclick="clearInput(this);"/><br>
		<input type="submit" value="REGISTER" id="btn_register" class="btn_standard" />
	</fieldset>
</form>