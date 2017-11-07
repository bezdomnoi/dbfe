function fieldsMatch(id1,id2) {
	
	el1 = document.getElementById(id1);
	el2 = document.getElementById(id2);
	
	if (el1.value==el2.value) {
		return true;
	} else {
		el1.style.backgroundColor="red";
		el2.style.backgroundColor="red";
		alert('Highlighted fields do not match');
		return false;
	}
}

function clearInput(el) {
	el.style.backgroundColor="";
	el.value = '';
}