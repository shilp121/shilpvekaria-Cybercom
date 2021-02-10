function validateform(){
    var checkbox = validChk("game[]");
    var checkgender = validChk("gender[]");

	if(document.myform.name.value ==""){
		alert("Please provide your Name!");
		document.myform.name.focus();
		return false;
	}
	if(document.myform.password.value ==""){
		alert("Enter password!");
		document.myform.password.focus();
		return false;
	}
	if(document.myform.address.value ==""){
		alert("Please provide your address!");
		document.myform.address.focus();
		return false;
	}
	/*if(document.myform.game.checked==""){
		alert("Select atleast one game");
		document.myform.game.focus();
		return false;
	}*/

	
	/*if(document.myform.gender.value==""){
		alert("Select your gender!");
		document.myform.gender.focus();
		return false;
	}*/
	/*if (!male.checked && !female.checked) {
        alert('You must select male or female');
        return false;
    }*/
	if(document.myform.age.selectedIndex == 0){
		alert("Select your Age group");
		document.myform.Select.focus();
		return false;
	}
	if(document.myform.file.value ==""){
		alert("Select file to upload!");
		document.myform.file.focus();
		return false;
	}

function validChk(name) {
    var chkBox = document.getElementsByName(name);
    var lenChkBox = chkBox.length;
    //alert(lenChkBox)
    var valid = 0;
    for (var i = 0; i < lenChkBox; i++) {
        if (chkBox[i].checked == true) {
            valid = 1;
            break;
        }
    }
    if (valid == 0) {
    		msg='Please select atleast one value';
			alert(msg);

        return false;
    }
    return true;
}


}



