/**
These JavaScript functions are included in validation.php to only allow students
to select classes that they are eligible for, this is done by either enabling
or disabling checkboxes for classes as needed.

For example, if CMSC201 has not been checked, then CMSC202's checkbox is disabled.
Once CMSC201 has been checked, CMSC202 is enabled and able to be selected now.
*/

	var tester = 0;
/*
Function called when CMSC201 is either selected or un-selected.
This will either enable or disable CMSC202,
and then calls toggle202Required to walk up the list of
courses since everything has 201 and 202 as a prerequisite.
*/
function toggle201Required(is201Checked){
	document.getElementById("cmsc202").checked = false;
	document.getElementById("cmsc202").disabled = is201Checked ? false: true;

	toggle202Required();
}

/*
Function called when CMSC202 is either selected or unselected.
This will either enable or disable CMSC203, and then calls
toggle200LevelRequired to walk up the list of courses.
*/
function toggle202Required(){
	var is202Checked = document.getElementById("cmsc202").checked;
	document.getElementById("cmsc203").checked = false;
	document.getElementById("cmsc203").disabled = is202Checked ? false: true;

	document.getElementById("cmsc304").checked = false;
	document.getElementById("cmsc304").disabled = is202Checked ? false: true;

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
	document.getElementById("cmsc232").checked = false;
	document.getElementById("cmsc291").checked = false;
	document.getElementById("cmsc299").checked = false;
	document.getElementById("cmsc313").checked = false;
	document.getElementById("cmsc331").checked = false;
	document.getElementById("cmsc341").checked = false;
	document.getElementById("cmsc352").checked = false;
	document.getElementById("cmsc391").checked = false;
	document.getElementById("cmsc451").checked = false;
	document.getElementById("cmsc452").checked = false;

	var is202Checked = document.getElementById("cmsc202").checked;
	var is203Checked = document.getElementById("cmsc203").checked;

	// If cmsc202 & cmsc203 are checked, enable all classes that have
	// them as prereqs
	if (is202Checked && is203Checked){
		document.getElementById("cmsc232").disabled = false;
		document.getElementById("cmsc291").disabled = false;
		document.getElementById("cmsc299").disabled = false;
		document.getElementById("cmsc313").disabled = false;
		document.getElementById("cmsc331").disabled = false;
		document.getElementById("cmsc341").disabled = false;
		document.getElementById("cmsc352").disabled = false;
		document.getElementById("cmsc391").disabled = false;
		document.getElementById("cmsc451").disabled = false;
		document.getElementById("cmsc452").disabled = false;
	}
	// Unable to take these classes, disable them
	else{
		document.getElementById("cmsc232").disabled = true;
		document.getElementById("cmsc291").disabled = true;
		document.getElementById("cmsc299").disabled = true;
		document.getElementById("cmsc313").disabled = true;
		document.getElementById("cmsc331").disabled = true;
		document.getElementById("cmsc341").disabled = true;
		document.getElementById("cmsc352").disabled = true;
		document.getElementById("cmsc391").disabled = true;
		document.getElementById("cmsc451").disabled = true;
		document.getElementById("cmsc452").disabled = true;
	}

	need313Only();
	need341Only();
	need341AndStat();
	toggleComputerGraphics();
	need341AndMath();
	toggle300LevelRequired();
}

/*
Either enables or disables CMSC411 Architecture based on CMSC313's status,
as 313 is its only prerequisite.
Also calls other classes where CMSC313 is a prerequisite.
*/
function need313Only(){
	document.getElementById("cmsc411").checked = false;
	var is313Checked = document.getElementById("cmsc313").checked;
	document.getElementById("cmsc411").disabled = is313Checked ? false: true;

	toggle300LevelRequired();
	toggleComputerGraphics();

}

/*
Function called when 341 is toggled as it is the only prereq
for the following 400-level courses
Also calls other functions where CMSC341 is a prerequisite.
*/
function need341Only(){
	document.getElementById("cmsc461").checked = false;
	document.getElementById("cmsc465").checked = false;
	document.getElementById("cmsc466").checked = false;
	document.getElementById("cmsc471").checked = false;
	document.getElementById("cmsc476").checked = false;
	document.getElementById("cmsc481").checked = false;
	document.getElementById("cmsc484").checked = false;
	document.getElementById("cmsc486").checked = false;
	document.getElementById("cmsc487").checked = false;
	document.getElementById("cmsc491").checked = false;
	document.getElementById("cmsc495").checked = false;

	var is341Checked = document.getElementById("cmsc341").checked;

	if (is341Checked){
		document.getElementById("cmsc461").disabled = false;
		document.getElementById("cmsc465").disabled = false;
		document.getElementById("cmsc466").disabled = false;
		document.getElementById("cmsc471").disabled = false;
		document.getElementById("cmsc476").disabled = false;
		document.getElementById("cmsc481").disabled = false;
		document.getElementById("cmsc484").disabled = false;
		document.getElementById("cmsc486").disabled = false;
		document.getElementById("cmsc487").disabled = false;
		document.getElementById("cmsc491").disabled = false;
		document.getElementById("cmsc495").disabled = false;
	}
	else{
		document.getElementById("cmsc461").disabled = true;
		document.getElementById("cmsc465").disabled = true;
		document.getElementById("cmsc466").disabled = true;
		document.getElementById("cmsc471").disabled = true;
		document.getElementById("cmsc476").disabled = true;
		document.getElementById("cmsc481").disabled = true;
		document.getElementById("cmsc484").disabled = true;
		document.getElementById("cmsc486").disabled = true;
		document.getElementById("cmsc487").disabled = true;
		document.getElementById("cmsc491").disabled = true;
		document.getElementById("cmsc495").disabled = true;
	}

	toggle300LevelRequired();
	need341AndStat();
	toggleComputerGraphics();
	need341AndMath();
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

	var is313Checked = document.getElementById("cmsc313").checked;
	var is341Checked = document.getElementById("cmsc341").checked;
	var is221Checked = document.getElementById("math221").checked;

	if (is313Checked && is341Checked && is221Checked){
		document.getElementById("cmsc435").disabled = false;
	}
	else{
		document.getElementById("cmsc435").disabled = true;
	}
}

/*
Function called when either CMSC341, MATH221, or MATH152 toggled
as these are prerequisites for the following 400 level CMSC courses.
*/
function need341AndMath(){
	document.getElementById("cmsc455").checked = false;
	document.getElementById("cmsc456").checked = false;
	document.getElementById("cmsc457").checked = false;

	var is341Checked = document.getElementById("cmsc341").checked;
	var is221Checked = document.getElementById("math221").checked;
	var is152Checked = document.getElementById("math152").checked;

	if (is341Checked && is221Checked && is152Checked){
		document.getElementById("cmsc455").disabled = false;
		document.getElementById("cmsc456").disabled = false;
		document.getElementById("cmsc457").disabled = false;
	}
	else{
		document.getElementById("cmsc455").disabled = true;
		document.getElementById("cmsc456").disabled = true;
		document.getElementById("cmsc457").disabled = true;
	}
}


/*
Function called when either CMSC313 or CMSC341 are selected or un-selected.
This will uncheck all classes that have them as prereqs, and will enable
them if both 313&341 are selected (since they're now eligible), or
disable them otherwise (not eligible to take)
*/
function toggle300LevelRequired(){
	// Uncheck all classes that have cmsc313 & cmsc341 as prereqs
	document.getElementById("cmsc352").checked = false;
	document.getElementById("cmsc391").checked = false;
	document.getElementById("cmsc404").checked = false;
	document.getElementById("cmsc421").checked = false;
	document.getElementById("cmsc427").checked = false;
	document.getElementById("cmsc431").checked = false;
	document.getElementById("cmsc432").checked = false;
	document.getElementById("cmsc433").checked = false;
	document.getElementById("cmsc436").checked = false;
	document.getElementById("cmsc437").checked = false;
	document.getElementById("cmsc442").checked = false;
	document.getElementById("cmsc443").checked = false;
	document.getElementById("cmsc444").checked = false;
	document.getElementById("cmsc446").checked = false;
	document.getElementById("cmsc447").checked = false;
	document.getElementById("cmsc453").checked = false;
	document.getElementById("cmsc498").checked = false;
	document.getElementById("cmsc499").checked = false;

	var is313Checked = document.getElementById("cmsc313").checked;
	var is341Checked = document.getElementById("cmsc341").checked;

	// If cmsc313 & cmsc341 are checked, enable all classes that have
	// them as prereqs
	if (is313Checked && is341Checked){
		document.getElementById("cmsc352").disabled = false;
		document.getElementById("cmsc391").disabled = false;
		document.getElementById("cmsc404").disabled = false;
		document.getElementById("cmsc421").disabled = false;
		document.getElementById("cmsc427").disabled = false;
		document.getElementById("cmsc431").disabled = false;
		document.getElementById("cmsc432").disabled = false;
		document.getElementById("cmsc433").disabled = false;
		document.getElementById("cmsc436").disabled = false;
		document.getElementById("cmsc437").disabled = false;
		document.getElementById("cmsc442").disabled = false;
		document.getElementById("cmsc443").disabled = false;
		document.getElementById("cmsc444").disabled = false;
		document.getElementById("cmsc446").disabled = false;
		document.getElementById("cmsc447").disabled = false;
		document.getElementById("cmsc453").disabled = false;
		document.getElementById("cmsc498").disabled = false;
		document.getElementById("cmsc499").disabled = false;
	}
	// Unable to take these classes, disable them
	else{
		document.getElementById("cmsc352").disabled = true;
		document.getElementById("cmsc391").disabled = true;
		document.getElementById("cmsc404").disabled = true;
		document.getElementById("cmsc421").disabled = true;
		document.getElementById("cmsc427").disabled = true;
		document.getElementById("cmsc431").disabled = true;
		document.getElementById("cmsc432").disabled = true;
		document.getElementById("cmsc433").disabled = true;
		document.getElementById("cmsc436").disabled = true;
		document.getElementById("cmsc437").disabled = true;
		document.getElementById("cmsc442").disabled = true;
		document.getElementById("cmsc443").disabled = true;
		document.getElementById("cmsc444").disabled = true;
		document.getElementById("cmsc446").disabled = true;
		document.getElementById("cmsc447").disabled = true;
		document.getElementById("cmsc453").disabled = true;
		document.getElementById("cmsc498").disabled = true;
		document.getElementById("cmsc499").disabled = true;
	}

	need421Only();
	need447Only();
	need471Only();
	toggleCapstone();
}

/*
Function called when CMSC421 Operating Systems is toggled,
as it is the only prerequisites for the following courses.
*/
function need421Only(){
	var is421Checked = document.getElementById("cmsc421").checked;

	document.getElementById("cmsc426").checked = false;
	document.getElementById("cmsc426").disabled = is421Checked ? false: true;

	document.getElementById("cmsc483").checked = false;
	document.getElementById("cmsc483").disabled = is421Checked ? false: true;

}

/*
Function called when CMSC447 Software Engineering is toggled,
as it is the only prerequisites for CMSC448.
*/
function need447Only(){
	var is447Checked = document.getElementById("cmsc447").checked;

	document.getElementById("cmsc448").checked = false;
	document.getElementById("cmsc448").disabled = is447Checked ? false: true;

}

/*
Function called when CMSC471 Intro to Artificial Intelligence is
toggled, as it is the prerequisite for the following 400-level
electives.
*/
function need471Only(){
	document.getElementById("cmsc473").checked = false;
	document.getElementById("cmsc475").checked = false;
	document.getElementById("cmsc477").checked = false;
	document.getElementById("cmsc478").checked = false;
	document.getElementById("cmsc479").checked = false;

	var is471Checked = document.getElementById("cmsc471").checked;

	if (is471Checked){
		document.getElementById("cmsc473").disabled = false;
		document.getElementById("cmsc475").disabled = false;
		document.getElementById("cmsc477").disabled = false;
		document.getElementById("cmsc478").disabled = false;
		document.getElementById("cmsc479").disabled = false;
	}
	else{
		document.getElementById("cmsc473").disabled = true;
		document.getElementById("cmsc475").disabled = true;
		document.getElementById("cmsc477").disabled = true;
		document.getElementById("cmsc478").disabled = true;
		document.getElementById("cmsc479").disabled = true;
	}
}

/*
Either enables or disables CMSC493 Capstone Project after
CMSC435 or CMSC471 are toggled as these are Capstone's only
prerequisites.
*/
function toggleCapstone(){
	var is435Checked = document.getElementById("cmsc435").checked;
	var is471Checked = document.getElementById("cmsc471").checked;

	document.getElementById("cmsc493").checked = false;

	if (is435Checked && is471Checked){
		document.getElementById("cmsc493").disabled = false;
	}
	else{
		document.getElementById("cmsc493").disabled = true;
	}
}

/*
Code to handle input validation on StudentID, name, email, and phone.
Checks to make sure their input is correct and if not displays an error.
Unable to submit until all inputs validated as correct
*/
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
    		if(phone.search(/\d{3}\-\d{3}\-\d{4}/) !== 0){
    			document.getElementById("phoneErr").innerHTML = "Format should be 410-776-7777";
    			accept = false;
    		}
    		return accept;
    	};