/**
This JavaScript function is included in validation.php to only allow students
to select classes that they are eligible for, this is done by either enabling
or disabling checkboxes for classes as needed.

For example, if CMSC201 has not been checked, then CMSC202's checkbox is disabled.
Once CMSC201 has been checked, CMSC202 is enabled and able to be selected now.
*/


/*
Function called when CMSC201 is either selected or un-selected.
This will either enable or disable CMSC202 & CMSC203,
and then calls toggle200LevelRequired to walk up the list of
courses since everything has 201 as a prerequisite.
*/
function toggle201Required(is201Checked){
	document.getElementById("cmsc202").checked = false;
	document.getElementById("cmsc202").disabled = is201Checked ? false: true;

	document.getElementById("cmsc203").checked = false;
	document.getElementById("cmsc203").disabled = is201Checked ? false: true;

	toggle200LevelRequired();
}

/*
Function called when either CMSC202 or CMSC203 are selected or un-selected.
This will uncheck all classes that have them as prereqs, and will enable
them if both 202&203 are selected (since they're now eligible), or
disable them otherwise (not eligible to take)
*/
function toggle200LevelRequired(){
	// Uncheck all classes that have cmsc202 & cmsc203 as prereqs
	document.getElementById("cmsc313").checked = false;
	document.getElementById("cmsc331").checked = false;
	document.getElementById("cmsc341").checked = false;
	document.getElementById("cmsc451").checked = false;
	document.getElementById("cmsc452").checked = false;

	var is202Checked = document.getElementById("cmsc202").checked;
	var is203Checked = document.getElementById("cmsc203").checked;

	// If cmsc202 & cmsc203 are checked, enable all classes that have
	// them as prereqs
	if (is202Checked && is203Checked){
		document.getElementById("cmsc313").disabled = false;
		document.getElementById("cmsc331").disabled = false;
		document.getElementById("cmsc341").disabled = false;
		document.getElementById("cmsc451").disabled = false;
		document.getElementById("cmsc452").disabled = false;
	}
	// Unable to take these classes, disable them
	else{
		document.getElementById("cmsc313").disabled = true;
		document.getElementById("cmsc331").disabled = true;
		document.getElementById("cmsc341").disabled = true;
		document.getElementById("cmsc451").disabled = true;
		document.getElementById("cmsc452").disabled = true;
	}
}

/*
Either enables or disables CMSC411 Architecture based on 313's status,
as 313 is its only prerequisite.
*/
function need313Only(){
	document.getElementById("cmsc411").checked = false;
	var is313Checked = document.getElementById("cmsc313").checked;
	document.getElementById("cmsc452").disabled = is313Checked ? false: true;
}

/*
Either enables or disables CMSC441 Algorithms based on CMSC341 and
STAT355 status, as those are its two prerequisites.
*/
function need341AndStat(){
	document.getElementById("cmsc441").checked = false;
	var is341Checked = document.getElementById("cmsc341").checked;
	var is355Checked = document.getElementById("stat355").checked;

	if (is341Checked && is355Checked){
		document.getElementById("cmsc441").disabled = false;
	}
	else{
		document.getElementById("cmsc441").disabled = true;
	}
}

/*
Either enables or disables CMSC435 based on CMSC313, CMSC341, and
MATH221 status, as those are its prerequisites.
*/
function toggleComputerGraphics(){
	document.getElementById("cmsc435").checked = false;

	
}


/*
Function called when either CMSC313 or CMSC341 are selected or un-selected.
This will uncheck all classes that have them as prereqs, and will enable
them if both 313&341 are selected (since they're now eligible), or
disable them otherwise (not eligible to take)
*/
function toggle300LevelRequired(){
	// Uncheck all classes that have cmsc313 & cmsc341 as prereqs
	document.getElementById("cmsc421").checked = false;
	document.getElementById("cmsc431").checked = false;
	document.getElementById("cmsc432").checked = false;
	document.getElementById("cmsc433").checked = false;
	document.getElementById("cmsc435").checked = false;
	document.getElementById("cmsc436").checked = false;
	document.getElementById("cmsc437").checked = false;
	document.getElementById("cmsc442").checked = false;
	document.getElementById("cmsc443").checked = false;
	document.getElementById("cmsc444").checked = false;
	document.getElementById("cmsc446").checked = false;
	document.getElementById("cmsc447").checked = false;
	document.getElementById("cmsc453").checked = false;

	var is313Checked = document.getElementById("cmsc313").checked;
	var is341Checked = document.getElementById("cmsc341").checked;

	// If cmsc313 & cmsc341 are checked, enable all classes that have
	// them as prereqs
	if (is313Checked && is341Checked){
		document.getElementById("cmsc421").disabled = false;
		document.getElementById("cmsc431").disabled = false;
		document.getElementById("cmsc432").disabled = false;
		document.getElementById("cmsc433").disabled = false;
		document.getElementById("cmsc435").disabled = false;
		document.getElementById("cmsc436").disabled = false;
		document.getElementById("cmsc437").disabled = false;
		document.getElementById("cmsc442").disabled = false;
		document.getElementById("cmsc443").disabled = false;
		document.getElementById("cmsc444").disabled = false;
		document.getElementById("cmsc446").disabled = false;
		document.getElementById("cmsc447").disabled = false;
		document.getElementById("cmsc453").disabled = false;
	}
	// Unable to take these classes, disable them
	else{
		document.getElementById("cmsc421").disabled = true;
		document.getElementById("cmsc431").disabled = true;
		document.getElementById("cmsc432").disabled = true;
		document.getElementById("cmsc433").disabled = true;
		document.getElementById("cmsc435").disabled = true;
		document.getElementById("cmsc436").disabled = true;
		document.getElementById("cmsc437").disabled = true;
		document.getElementById("cmsc442").disabled = true;
		document.getElementById("cmsc443").disabled = true;
		document.getElementById("cmsc444").disabled = true;
		document.getElementById("cmsc446").disabled = true;
		document.getElementById("cmsc447").disabled = true;
		document.getElementById("cmsc453").disabled = true;
	}
}

var form = document.getElementById("infoForm");
    	form.onsubmit = function(){
    		var accept = true;
    		var studentId = document.getElementById("studentId").value;
    		var name = document.getElementById("name").value;
    		var email = document.getElementById("email").value;
    		var phone = document.getElementById("phone").value;

    		//reset errors
    		document.getElementById("idErr").innerHTML = "*";
    		document.getElementById("namErr").innerHTML = "*";
    		document.getElementById("emailErr").innerHTML = "*";
    		document.getElementById("phoneErr").innerHTML = "*";
    		if(studentId.search(/[a-zA-z]{2}\d{4}/) !== 0){
    			document.getElementById("idErr").innerHTML = "The id should be 2 letters and 5 numbers";
    			accept = false;
    		}
    		if(name.replace(/[A-Za-z ]+/ ,"") !== "" ){
    			document.getElementById("namErr").innerHTML = "Name's should only have letters and spaces";
    			accept = false;
    		}
    		if(email.replace(/[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm, "") !== ""){
    			document.getElementById("emailErr").innerHTML = "Invalid email";
    			accept = false;
    		}
    		if(phone.search(/\d{3}\-\d{3}\-\d{4}/) != 0){
    			document.getElementById("phoneErr").innerHTML = "Format should be 410-776-7777";
    			accept = false;
    		}
    		return accept;
    	};