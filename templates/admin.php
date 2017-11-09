<?php
			
?>
<form id="FORM_ADMIN_USERS" action="admin.php" method="post" onsubmit="return checkFields(this);">
	<fieldset>
		<legend>Update User</legend>
		<input type="hidden" name="FORM_CONTROLLER" value="USER_UPDATE_ADMIN"/>
		<label for="user_id">User ID :</label>
		<input type="text" name="user_id" id="user_id" value="<?php echo $id; ?>" disabled /><br>
		<label for="user_email">User Email :</label>
		<input type="email" name="user_email" id="user_email" value="<?php echo $email; ?>" pattern=".+@.+\..+" /><br>
		<label for="user_display">Display name :</label>
		<input type="text" name="user_display" id="user_display" value="<?php echo $display ?>" /><br>
		<label for="user_password1">Enter new password :</label>
		<input type="password" name="user_password1" id="user_password1" onfocus="clearInput(this);" /><br>
		<label for="user_password2">Confirm new password :</label>
		<input type="password" name="user_password2" id="user_password2" onfocus="clearInput(this);" /><br>
		<input type="submit" value="UPDATE" id="btn_update" class="btn_standard" />
	</fieldset>
</form>


<?php

?>
