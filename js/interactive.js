function clearInput(el) {
	if (el.style.backgroundColor!="") {
		el.style.backgroundColor="";
		el.value = '';
	}
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

	pswd1.style.backgroundColor="red";
	pswd2.style.backgroundColor="red";
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
	}
}