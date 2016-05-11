/**
These JavaScript functions are included in validation.php to only allow students
to select classes that they are eligible for, this is done by either enabling
or disabling checkboxes for classes as needed.

For example, if CMSC201 has not been checked, then CMSC202's checkbox is disabled.
Once CMSC201 has been checked, CMSC202 is enabled and able to be selected now.
*/


/*
Function called when CMSC201 is either selected or un-selected.
This will either enable or disable CMSC202,
and then calls toggle202Required to walk up the list of
courses since everything has 201 as a prerequisite.
*/
function toggle201Required(){
	var classes = ["cmsc202"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);

	var is201Checked = document.getElementById("cmsc201").checked;
	if (is201Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

	toggle202Required();
}

/*
Function called when CMSC202 is either selected or unselected.
This will either enable or disable CMSC203, and then calls
toggle200LevelRequired to walk up the list of courses.
*/
function toggle202Required(){
	var classes = ["cmsc203", "cmsc304"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);

	var is202Checked = document.getElementById("cmsc202").checked;
	if (is202Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

	toggle200LevelRequired();
}

/*
Function called when either CMSC202 or CMSC203 are selected or un-selected.
This will uncheck all classes that have them as prereqs, and will enable
them if both 202&203 are selected (since they're now eligible), or
disable them otherwise (not eligible to take)

Also calls 300-level functions to continue walking up the list of courses
since 202 & 203 are prereqs for anything 300-level and above
*/
function toggle200LevelRequired(){
	// Uncheck all classes that have cmsc202 & cmsc203 as prereqs
	var classes = [
					"cmsc232", 
					"cmsc291", 
					"cmsc299", 
					"cmsc313",
					"cmsc331",
					"cmsc341",
					"cmsc352",
					"cmsc391",
					"cmsc451",
					"cmsc452"
				];

	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);		

	var is202Checked = document.getElementById("cmsc202").checked;
	var is203Checked = document.getElementById("cmsc203").checked;

	if (is202Checked && is203Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}


	// Next 3 functions are called to continue walking up
	// into and through 300 level classes since CMSC202&203
	// are prerequisites for all higher-level classes
	need313Only(); 
	need341Only();
	toggle300LevelRequired();

}

/*
Either enables or disables CMSC411 Architecture based on CMSC313's status,
as 313 is its only prerequisite.
Also calls other functions where CMSC313 is a prerequisite.
*/
function need313Only(){
	var classes = ["cmsc411"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is313Checked = document.getElementById("cmsc313").checked;
	if (is313Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

	// Calls these two functions since 313 is a prerequisite
	// in both of these functions as well, and it's easier to
	// call them from in here
	toggle300LevelRequired();
	toggleComputerGraphics();
}

/*
Function called when 341 is toggled as it is the only prereq
for the following 400-level courses
Also calls other functions where CMSC341 is a prerequisite.
*/
function need341Only(){

	var classes = [
					"cmsc461", 
					"cmsc465",
					"cmsc466",
					"cmsc471",
					"cmsc476",
					"cmsc481",
					"cmsc484",
					"cmsc486",
					"cmsc487",
					"cmsc491",
					"cmsc495"
				];	

	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is341Checked = document.getElementById("cmsc341").checked;

	if (is341Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}	

	// These 3 functions are called as CMSC341 are prerequisites
	// in all of them as well and it's easiest to call them from
	// here and continue walking up the courses
	toggle300LevelRequired();
	need341AndStat();
	toggleComputerGraphics();

}

/*
Either enables or disables CMSC441 Algorithms based on CMSC341 and
STAT355 status, as those are its two prerequisites.
*/
function need341AndStat(){
	var classes = ["cmsc441"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is341Checked = document.getElementById("cmsc341").checked;
	var is355Checked = document.getElementById("stat355").checked;

	if (is341Checked && is355Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Either enables or disables CMSC435 based on CMSC313, CMSC341, and
MATH221 status, as those are its prerequisites.
*/
function toggleComputerGraphics(){
	var classes = ["cmsc435"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is313Checked = document.getElementById("cmsc313").checked;
	var is341Checked = document.getElementById("cmsc341").checked;
	var is221Checked = document.getElementById("math221").checked;

	if (is313Checked && is341Checked && is221Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

	// Also called since both CMSC341 & MATH221 are prerequisites
	// in this function as well
	need341AndMath();
}

/*
Function called when either CMSC341, MATH221, or MATH152 toggled
as these are prerequisites for the following 400 level CMSC courses.
*/
function need341AndMath(){
	var classes = [
					"cmsc455",
					"cmsc456",
					"cmsc457"
				];
	
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);

	var is341Checked = document.getElementById("cmsc341").checked;
	var is221Checked = document.getElementById("math221").checked;
	var is152Checked = document.getElementById("math152").checked;

	if (is341Checked && is221Checked && is152Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

}


/*
Function called when either CMSC313 or CMSC341 are selected or un-selected.
This will uncheck all classes that have them as prereqs, and will enable
them if both 313&341 are selected (since they're now eligible), or
disable them otherwise (not eligible to take)

Also calls 400-level functions to continue walking up the courseload
since 313 & 341 are prerequisites for all 400-level courses
*/
function toggle300LevelRequired(){

	var classes = [
					"cmsc352",
					"cmsc391",
					"cmsc404",
					"cmsc421",
					"cmsc427",
					"cmsc431",
					"cmsc432",
					"cmsc433",
					"cmsc436",
					"cmsc437",
					"cmsc442",
					"cmsc443",
					"cmsc444",
					"cmsc446",
					"cmsc447",
					"cmsc453",
					"cmsc498",
					"cmsc499"
				];
				
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	
	

	var is313Checked = document.getElementById("cmsc313").checked;
	var is341Checked = document.getElementById("cmsc341").checked;	

	if (is313Checked && is341Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}			
	
	// Call 400 level functions since 313&341 are prereqs for them
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
	var classes = ["cmsc426", "cmsc483"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is421Checked = document.getElementById("cmsc421").checked;
	if (is421Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

}

/*
Function called when CMSC447 Software Engineering is toggled,
as it is the only prerequisites for CMSC448.
*/
function need447Only(){
	var classes = ["cmsc448"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);

	var is447Checked = document.getElementById("cmsc447").checked;
	if (is447Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}

}

/*
Function called when CMSC471 Intro to Artificial Intelligence is
toggled, as it is the prerequisite for the following 400-level
electives.
*/
function need471Only(){
	var classes = [
					"cmsc473",
					"cmsc475",
					"cmsc477",
					"cmsc478",
					"cmsc479"
				];

	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);
	
	var is471Checked = document.getElementById("cmsc471").checked;

	if (is471Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}			
	
	// CMSC471 is also a prerequisite for Capstone
	toggleCapstone();
}

/*
Either enables or disables CMSC493 Capstone Project after
CMSC435 or CMSC471 are toggled as these are Capstone's only
prerequisites.
*/
function toggleCapstone(){
	var classes = ["cmsc493"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is435Checked = document.getElementById("cmsc435").checked;
	var is471Checked = document.getElementById("cmsc471").checked;

	if (is435Checked && is471Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called when MATH152 is either selected or un-selected.
This will toggle the two other math courses as MATH152 is their
only prerequisite.
*/
function toggleMathCourses(){
	var classes = ["math152", "math221"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is151Checked = document.getElementById("math151").checked;
	if(is151Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called when BIOL100 is either selected or un-selected.
This will toggle BIOL301 which has 100 as its only prerequisite
*/
function toggleBiologyConcepts(){
	var classes = ["biol301"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is100Checked = document.getElementById("biol100").checked;
	if(is100Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called when BIOL141 is either selected or un-selected.
This will toggle BIOL142 which has 141 as its only prerequisite
*/
function toggleBiologyFoundations(){
	var classes = ["biol142"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is141Checked = document.getElementById("biol141").checked;
	if (is141Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called when CHEM101 is either selected or un-selected.
This will toggle CHEM102 which has 101 as its only prerequisite
*/
function toggleChemistry(){
	var classes = ["chem102"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is101Checked = document.getElementById("chem101").checked;
	if (is101Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called when PHYS121 is either selected or un-selected.
This will toggle PHYS122 which has 121 as its only prerequisite
*/
function togglePhysics(){
	var classes = ["phys122"];
	var arrayLength = classes.length;			
	uncheckClasses(classes, arrayLength);	

	var is121Checked = document.getElementById("phys121").checked;
	if(is121Checked){
		enableCheckboxes(classes, arrayLength);
	}
	else{
		disableCheckboxes(classes, arrayLength);
	}
}

/*
Function called to uncheck all classes contained within array
it is given as parameter
*/
function uncheckClasses(classes, arrayLength){
	for (var i = 0; i < arrayLength; i++){
		document.getElementById(classes[i]).checked = false;
	}	
}

/*
Function called to enable all classes contained within array
it is given as parameter
*/
function enableCheckboxes(classes, arrayLength){
	for (var j = 0; j < arrayLength; j++){
			document.getElementById(classes[j]).disabled = false;
		}
}

/*
Function called to disable all classes contained within array
it is given as parameter
*/
function disableCheckboxes(classes, arrayLength){
	for (var j = 0; j < arrayLength; j++){
			document.getElementById(classes[j]).disabled = true;
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