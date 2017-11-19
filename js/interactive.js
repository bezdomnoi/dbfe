function clearInput(el) {
	el.classList.remove('invalid');
	el.value = '';
}

function checkPasswords(pswd1,pswd2,pswd_pattern,pswd_legend) {
	var regex = new RegExp(pswd_pattern); // /^.{8,}$/;
	var ok = false;
	if (pswd1.value==pswd2.value) {
		if (regex.test(pswd1.value)) {
			return true;
		} else {
			alert(pswd_legend);
		}
	} else {
		alert('Passwords do not match');
	}

	pswd1.classList.add('invalid');
	pswd2.classList.add('invalid');
	return false;

}

function checkFields(frm) {
	if (frm.id == 'FORM_USER_REGISTER') 
	{
		pswd1 = document.getElementById('user_password1');
		pswd2 = document.getElementById('user_password2');
		
		if (typeof(password_pattern) == 'undefined') password_pattern = /.*/;
		if (typeof(password_legend) == 'undefined') password_legend = "";
		return checkPasswords(pswd1,pswd2,password_pattern,password_legend);
	
	} else if (frm.id == 'FORM_USER_PROFILE') 
	{
		pswd1 = document.getElementById('user_password1');
		pswd2 = document.getElementById('user_password2');
		
		if (pswd1.value.length > 0) {
			if (typeof(password_pattern) == 'undefined') password_pattern = /.*/;
			if (typeof(password_legend) == 'undefined') password_legend = "";
			return checkPasswords(pswd1,pswd2,password_pattern,password_legend);
		}
	}
	
}