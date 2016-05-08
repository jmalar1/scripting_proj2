<!-- 
Authors: 

Description:
    This is the main page that users will first look at. This is where they will put in
their credentials which include their UMBC student ID, name, e-mail, and phone number.
Then they click on the check boxes of the classes they have already taken.

Default character encoding in HTML5 is UTF-8
-->


<!DOCTYPE html>
<html>
    <!-- This is the title that appears at the top tab of the browser -->
    <title>UMBC | CMSC Advising</title>
    
<head>
    <!-- This is for the icon at the top of the page with the title -->
    <link rel="icon" href="icon.png">
    
    <!-- Link to the css file that stylizes the html in this document -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <!-- The "topTitle" div -->
    <!-- Has one span in it to highlght the "UMBC" red in title -->
    <div class = "topTitle">
        <h1> <span style = "color:#FF3400"> UMBC </span> Advising for Computer Science Majors </h1> 
    </div>

    <!-- NAVIGATION BAR(LEFT-SIDE) with three things: Home, List of Classes, and About tab --> 
    <!-- Currently it all the options link to the same html file -->
    <ul>
        <!-- Sets the current item in the navigation bar active which is Home -->
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>

    <!-- MAIN DIV -->
    <!--The main div to put the form in, which will take in all the user input using textboxes and checkboxes--> 
        <div class = "mainDiv">
            <h2>Registration Info:</h2>
            <hr>
            <p><span class="error">* required field.</span></p><br>
        <form method="post" action="validation.php" id="infoForm">
            Student ID:<br> 
            <input type="text" name="ID" id="studentId" maxlength="7" minlength="7">
            <span class="error" id="idErr">* </span>
            <br>
            Name:<br> 
            <input type="text" name="name" id="name" minlength="1">
            <span class="error" id="namErr">* </span>
            <br>
            E-mail:<br> 
            <input type="text" name="email" id = "email" minlength="1">
            <span class="error" id="emailErr">* </span>
            <br>
            Phone Number:<br>
            <input type="text" name="phone" id="phone" placeholder="###-###-####" maxlength="14" minlength="12">
            <span class="error" id="phoneErr">* </span>
            <br><br>

            <!-- a list of checkboxes for user to select classes they've taken --> 
            <h3>Classes Taken (check any class you have taken)</h2><hr><br>
             
            <!-- List of the mandatory computer science course you need to take -->
             <b>Required Computer Science Courses:</b><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC201"> CMSC201 (4.00) Computer Science I for Majors</label> <br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC202"> CMSC202 (4.00) Computer Science II for Majors</label> <br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC203"> CMSC203 (3.00) Discrete Structures</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC304"> CMSC304 (3.00) Social and Ethical Issues in Information Technology</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC313"> CMSC313 (3.00) Computer Organization & Assembly Language Program</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC331"> CMSC331 (3.00) Principles of Programming Language</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC341"> CMSC341 (3.00) Data Structures</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC411"> CMSC411 (3.00) Computer Architecture</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC421"> CMSC421 (3.00) Principles of Operating Systems</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC441"> CMSC441 (3.00) Design and Analysis of Algorithms</label><br>
             <label><input type="checkbox" name="classTaken[]" value="CMSC447"> CMSC447 (3.00) Software Design and Development</label><br>
            
            <!-- List of the mandatory math courses you need to take for computer science -->
            <br><b>Required Mathematics Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="MATH151"> MATH151 (4.00) Calculus and Analytic Geometry I</label><br>
            <label><input type="checkbox" name="classTaken[]" value="MATH152"> MATH152 (4.00) Calculus and Analytic Geometry II</label><br>
            <label><input type="checkbox" name="classTaken[]" value="MATH221"> MATH221 (3.00) Introduction to Linear Algebra</label><br>
           
            <!-- List of stat classes you are required to take as a computer science major (only one) -->
            <br><b>Required Statistics Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="STAT355"> STAT355 (4.00) - Introduction to Probability and Statistics for Scientists and Engineers</label><br>

            <!-- These are the science courses that a student could have taken (they need 12 credits of a science) which includes a lab -->
            <br><b>Required Science Courses: <br>(Computer science majors must take 12 credits in science courses. <br>Two courses must be from one of the following sequences)</b><br><br>
            <label><input type="checkbox" name="classTaken[]" value="BIOL100"> BIOL100 - Concepts of Biology (4.00)</label><br>
            <label><input type="checkbox" name="classTaken[]" value="BIOL301"> BIOL301 - Ecology and Evolution (3.00)</label><br><br>
            <label><input type="checkbox" name="classTaken[]" value="BIOL141"> BIOL141 - Foundations of Biology: Cells, Energy and Organisms (4.00)</label><br>
            <label><input type="checkbox" name="classTaken[]" value="BIOL142"> BIOL142 - Foundations of Biology: Ecology and Evolution (4.00)</label><br><br>
            <label><input type="checkbox" name="classTaken[]" value="CHEM101"> CHEM101 - Principles of Chemistry I (4.00)</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CHEM102"> CHEM102 - Principles of Chemistry II (4.00)</label><br><br>
            <label><input type="checkbox" name="classTaken[]" value="PHYS121"> PHYS121 - Introductory Physics I (4.00)</label><br>
            <label><input type="checkbox" name="classTaken[]" value="PHYS122"> PHYS122 - Introductory Physics II (4.00)</label><br>    
            
            <!-- These are computer science electives one could have taken if they so choose -->
            <br><b>Computer Science Electives 200 level Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC232"> CMSC232 (2.00) Advanced Java Techniques</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC291"> CMSC291 (1.00 - 4.00) Special Topics in Computer Science</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC299"> CMSC299 (1.00 - 4.00) Independent Study in Computer Science</label><br><br>
            
            <!-- These are a list of the computer science electives at the 300 level -->
            <br><b>Computer Science Electives 300 level Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC352"> CMSC352 (3.00) Women, Gender, and Information Technology</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC391"> CMSC391 (1.00 - 4.00) Special Topics in Computer Science</label><br><br>
            
            <!-- Computer science electives at the 400 level -->
            <br><b>Computer Science Electives 400 level Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC404"> CMSC404 (3.00) The History of Computers and Computing</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC426"> CMSC426 (3.00) Principles of Computer Security</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC427"> CMSC427 (3.00) Wearable Computing</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC431"> CMSC431 (3.00) Compiler Design Principles</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC432"> CMSC432 (3.00) Object-Oriented Programming Languages and Systems</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC433"> CMSC433 (3.00) Scripting Languages</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC435"> CMSC435 (3.00) Computer Graphics</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC436"> CMSC436 (3.00) Data Visualization</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC437"> CMSC437 (3.00) Graphical User Interface Programming</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC442"> CMSC442 (3.00) Information and Coding Theory</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC443"> CMSC443 (3.00) Cryptology</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC444"> CMSC444 (3.00) Information Assurance</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC446"> CMSC446 (3.00) Introduction to Design Patterns</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC448"> CMSC448 (3.00) Software Engineering II</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC451"> CMSC451 (3.00) Automata Theory and Formal Languages</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC452"> CMSC452 (3.00) Logic for Computer Science</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC453"> CMSC453 (3.00) Applied Combinatorics and Graph Theory</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC455"> CMSC455 (3.00) Numerical Computations</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC456"> CMSC456 (3.00) Symbolic Computation</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC457"> CMSC457 (3.00) Quantum Computation</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC461"> CMSC461 (3.00) Database Management Systems</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC465"> CMSC465 (3.00) Introduction to Electronic Commerce</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC466"> CMSC466 (3.00) Electronic Commerce Technology</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC471"> CMSC471 (3.00) Introduction to Artificial Intelligence</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC473"> CMSC473 (3.00) Introduction to Natural Language Processing</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC475"> CMSC475 (3.00) Introduction to Neural Networks</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC476"> CMSC476 (3.00) Information Retrieval</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC477"> CMSC477 (3.00) Agent Architectures and Multi-Agent Systems</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC478"> CMSC478 (3.00) Introduction to Machine Learning</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC479"> CMSC479 (3.00) Introduction to Robotics</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC481"> CMSC481 (3.00) Computer Networks</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC483"> CMSC483 (3.00) Parallel and Distributed Processing</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC484"> CMSC484 (3.00) Java Server Technologies</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC486"> CMSC486 (3.00) Mobile Telephony Communications</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC487"> CMSC487 (3.00) Introduction To Network Security</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC491"> CMSC491 (3.00) Special Topics in Computer Science</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC493"> CMSC493 (3.00) Capstone Games Group Project</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC495"> CMSC495 (3.00) Honors Thesis</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC498"> CMSC498 (3.00) Independent Study in Computer Science for CMSC Interns and Coop Students</label><br>
            <label><input type="checkbox" name="classTaken[]" value="CMSC499"> CMSC499 (1.00 - 4.00) Independent Study in Computer Science</label><br>
           
            <!-- This is the submit button -->
            <input class="submit" type="submit" name="submit" value="Submit"> 
        </form>
    </div>
  
    <!-- This footer is attached to the bottom of the page to state information such as copyright. It uses hexadecimal to display the copyright symbol -->
    <div id="footer">
    &#x000A9 2016 University of Maryland, Baltimore County | 1000 Hilltop Circle, Baltimore, MD 21250 | 410-455-1000
    </div>

    <script type="text/javascript">
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
    			document.getElementById("phoneErr").innerHTML = "Format should be like (410)-776-7777";
    			accept = false;
    		}
    		return accept;
    	};
    </script>
</body>
</html>