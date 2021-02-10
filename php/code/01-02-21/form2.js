function validateform(){
	
	if(document.myform.name.value==""){
		alert("please provide your Name!");
		return false;
	}
	if(document.myform.password.value==""){
		alert("Enter password!");
		return false;
	}

	var gender = gender_check("gender[]");
	
	if(document.myform.address.value==""){
		alert("Address is mandotary!");
		return false;
	}
	if(document.myform.day.value==""){
		alert("Select day");
		return false;
	}
	if(document.myform.month.value==""){
		alert("Select Month");
		return false;
	}
	if(document.myform.year.value==""){
		alert("Select Year");
		return false;
	}
	var game = validchk('game[]');
	var marital = maritual_status("marital[]");
	if(document.myform.agreement.checked==""){
		alert("Accept Agreement!");
		return false;
	}

}

function validchk(data){
	var chkbox = document.getElementsByName(data);
	var lenChkBox = chkbox.length;
	var valid = 0;
	for(i=0; i<lenChkBox; i++){
		if(chkbox[i].checked == true){
			valid = 1;
			break;
		}
		
	}
	if(valid==0){
		alert("Please Select One Game");
		return false;
	
	}
	return true;
}

function gender_check(data){
	var chkbox = document.getElementsByName(data);
	var lenChkBox = chkbox.length;
	var valid = 0;
	for(i=0; i<lenChkBox; i++){
		if(chkbox[i].checked == true){
			valid = 1;
			break;
		}
	}
	if(valid==0){
		alert("Select your Gender");
		return false;
	}
	return true;
}

function maritual_status(data){
	var chkbox = document.getElementsByName(data);
	var lenChkBox = chkbox.length;
	var valid = 0;
	for(i=0; i<lenChkBox; i++){
		if(chkbox[i].checked == true){
			valid = 1;
			break;
		}
	}
	if(valid==0){
		alert("Select your maritual status");
		return false;
	}
	return true;
}

