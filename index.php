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
            <input type="text" name="ID" id="studentId" placeholder="AB123345" maxlength="7" minlength="7">
            <span class="error" id="idErr">* </span>
            <br>
            Name:<br> 
            <input type="text" name="name" id="name" placeholder="John Smith" minlength="1">
            <span class="error" id="namErr">* </span>
            <br>
            E-mail:<br> 
            <input type="text" name="email" id = "email" placeholder="student1@umbc.edu" minlength="1">
            <span class="error" id="emailErr">* </span>
            <br>
            Phone Number:<br>
            <input type="text" name="phone" id="phone" placeholder="###-###-####" maxlength="14" minlength="12">
            <span class="error" id="phoneErr">* </span>
            <br><br>

            <!-- a list of checkboxes for user to select classes they've taken --> 
            <h3>Classes Taken (check any class you have already completed)</h2><hr><br>
             
            <!-- List of the mandatory computer science course you need to take -->
             <b>Required Computer Science Courses:</b><br>
             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC201" id="cmsc201"
             onchange="toggle201Required(this.checked);"> 
             CMSC201 (4.00) Computer Science I for Majors
             </label> <br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC202" id="cmsc202"
             disabled="disabled" onchange="toggle202Required();"> 
             CMSC202 (4.00) Computer Science II for Majors
             </label> <br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC203" id="cmsc203"
             disabled="disabled" onchange="toggle200LevelRequired();"> 
             CMSC203 (3.00) Discrete Structures
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC304" id="cmsc304"
             disabled="disabled"> 
             CMSC304 (3.00) Social and Ethical Issues in Information Technology
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC313" id="cmsc313"
             disabled="disabled" onchange="need313Only();"> 
             CMSC313 (3.00) Computer Organization & Assembly Language Program
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC331" id="cmsc331"
             disabled="disabled"> 
             CMSC331 (3.00) Principles of Programming Language
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC341" id="cmsc341"
             disabled="disabled" onchange="need341Only();"> 
             CMSC341 (3.00) Data Structures
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC411" id="cmsc411"
             disabled="disabled"> 
             CMSC411 (3.00) Computer Architecture
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC421" id="cmsc421"
             disabled="disabled" onchange="need421Only();"> 
             CMSC421 (3.00) Principles of Operating Systems
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC441" id="cmsc441"
             disabled="disabled"> 
             CMSC441 (3.00) Design and Analysis of Algorithms
             </label><br>

             <label>
             <input type="checkbox" name="classTaken[]" value="CMSC447" id="cmsc447"
             disabled="disabled" onchange="need447Only();"> 
             CMSC447 (3.00) Software Design and Development
             </label><br>
            
            <!-- List of the mandatory math courses you need to take for computer science -->
            <br><b>Required Mathematics Courses:</b><br>
            <label>
            <input type="checkbox" name="classTaken[]" value="MATH151" id="math151">
             MATH151 (4.00) Calculus and Analytic Geometry I
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="MATH152" id="math152"
            disabled="disabled"> 
            MATH152 (4.00) Calculus and Analytic Geometry II
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="MATH221" id="math221"
            disabled="disabled"> 
            MATH221 (3.00) Introduction to Linear Algebra
            </label><br>
           
            <!-- List of stat classes you are required to take as a computer science major (only one) -->
            <br><b>Required Statistics Courses:</b><br>
            <label><input type="checkbox" name="classTaken[]" value="STAT355" id="stat355"
            onchange="need341AndStat();"> 
            STAT355 (4.00) - Introduction to Probability and Statistics for Scientists and Engineers
            </label><br>

            <!-- These are the science courses that a student could have taken (they need 12 credits of a science) which includes a lab -->
            <br><b>Required Science Courses: <br>(Computer science majors must take 12 credits in science courses. <br>Two courses must be from one of the following sequences)</b><br><br>
            <label>
            <input type="checkbox" name="classTaken[]" value="BIOL100" id="biol100"> 
            BIOL100 - Concepts of Biology (4.00)
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="BIOL301" id="biol301"
            disabled="disabled"> 
            BIOL301 - Ecology and Evolution (3.00)
            </label><br>or<br>

            <label>
            <input type="checkbox" name="classTaken[]" value="BIOL141" id="biol141"> 
            BIOL141 - Foundations of Biology: Cells, Energy and Organisms (4.00)
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="BIOL142" id="biol142"
            disabled="disabled"> 
            BIOL142 - Foundations of Biology: Ecology and Evolution (4.00)
            </label><br>or<br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CHEM101" id="chem101"> 
            CHEM101 - Principles of Chemistry I (4.00)
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CHEM102" id="chem102"
            disabled="disabled"> 
            CHEM102 - Principles of Chemistry II (4.00)
            </label><br>or<br>

            <label>
            <input type="checkbox" name="classTaken[]" value="PHYS121" id="phys121"> 
            PHYS121 - Introductory Physics I (4.00)
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="PHYS122" id="phys122"
            disabled="disabled"> 
            PHYS122 - Introductory Physics II (4.00)
            </label><br>    
            
            <!-- These are computer science electives one could have taken if they so choose -->
            <br><b>Computer Science Electives 200 level Courses:</b><br>
            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC232" id="cmsc232"
            disabled="disabled"> 
            CMSC232 (2.00) Advanced Java Techniques
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC291" id="cmsc291"
            disabled="disabled"> 
            CMSC291 (1.00 - 4.00) Special Topics in Computer Science
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC299" id="cmsc299"
            disabled="disabled"> 
            CMSC299 (1.00 - 4.00) Independent Study in Computer Science
            </label><br><br>
            
            <!-- These are a list of the computer science electives at the 300 level -->
            <br><b>Computer Science Electives 300 level Courses:</b><br>
            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC352" id="cmsc352"
            disabled="disabled"> 
            CMSC352 (3.00) Women, Gender, and Information Technology
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC391" id="cmsc391"
            disabled="disabled"> 
            CMSC391 (1.00 - 4.00) Special Topics in Computer Science
            </label><br><br>
            
            <!-- Computer science electives at the 400 level -->
            <br><b>Computer Science Electives 400 level Courses:</b><br>
            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC404" id="cmsc404"
            disabled="disabled"> 
            CMSC404 (3.00) The History of Computers and Computing
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC426" id="cmsc426"
            disabled="disabled"> 
            CMSC426 (3.00) Principles of Computer Security
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC427" id="cmsc427"
            disabled="disabled"> 
            CMSC427 (3.00) Wearable Computing
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC431" id="cmsc431"
            disabled="disabled"> 
            CMSC431 (3.00) Compiler Design Principles
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC432" id="cmsc432"
            disabled="disabled"> 
            CMSC432 (3.00) Object-Oriented Programming Languages and Systems
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC433" id="cmsc433"
            disabled="disabled"> 
            CMSC433 (3.00) Scripting Languages
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC435" id="cmsc433"
            disabled="disabled" onchange="toggleCapstone();"> 
            CMSC435 (3.00) Computer Graphics
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC436" id="cmsc436"
            disabled="disabled"> 
            CMSC436 (3.00) Data Visualization
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC437" id="cmsc437"
            disabled="disabled"> 
            CMSC437 (3.00) Graphical User Interface Programming
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC442" id="cmsc442"
            disabled="disabled"> 
            CMSC442 (3.00) Information and Coding Theory
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC443" id="cmsc443"
            disabled="disabled"> 
            CMSC443 (3.00) Cryptology
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC444" id="cmsc444"
            disabled="disabled"> 
            CMSC444 (3.00) Information Assurance
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC446" id="cmsc446"
            disabled="disabled"> 
            CMSC446 (3.00) Introduction to Design Patterns
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC448" id="cmsc448"
            disabled="disabled"> 
            CMSC448 (3.00) Software Engineering II
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC451" id="cmsc451"
            disabled="disabled"> 
            CMSC451 (3.00) Automata Theory and Formal Languages
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC452" id="cmsc452"
            disabled="disabled"> 
            CMSC452 (3.00) Logic for Computer Science
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC453" id="cmsc453"
            disabled="disabled"> 
            CMSC453 (3.00) Applied Combinatorics and Graph Theory
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC455" id="cmsc455"
            disabled="disabled"> 
            CMSC455 (3.00) Numerical Computations
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC456" id="cmsc456"
            disabled="disabled"> 
            CMSC456 (3.00) Symbolic Computation
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC457" id="cmsc457"
            disabled="disabled"> 
            CMSC457 (3.00) Quantum Computation
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC461" id="cmsc461"
            disabled="disabled"> 
            CMSC461 (3.00) Database Management Systems
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC465" id="cmsc465"
            disabled="disabled"> 
            CMSC465 (3.00) Introduction to Electronic Commerce
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC466" id="cmsc466"
            disabled="disabled"> 
            CMSC466 (3.00) Electronic Commerce Technology
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC471" id="cmsc471"
            disabled="disabled" onchange="need471Only(); toggleCapstone();"> 
            CMSC471 (3.00) Introduction to Artificial Intelligence
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC473" id="cmsc473"
            disabled="disabled"> 
            CMSC473 (3.00) Introduction to Natural Language Processing
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC475" id="cmsc475"
            disabled="disabled"> 
            CMSC475 (3.00) Introduction to Neural Networks
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC476" id="cmsc476"
            disabled="disabled"> 
            CMSC476 (3.00) Information Retrieval
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC477" id="cmsc477"
            disabled="disabled"> 
            CMSC477 (3.00) Agent Architectures and Multi-Agent Systems
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC478" id="cmsc478"
            disabled="disabled"> 
            CMSC478 (3.00) Introduction to Machine Learning
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC479" id="cmsc479"
            disabled="disabled"> 
            CMSC479 (3.00) Introduction to Robotics
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC481" id="cmsc481"
            disabled="disabled"> 
            CMSC481 (3.00) Computer Networks
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC483" id="cmsc483"
            disabled="disabled"> 
            CMSC483 (3.00) Parallel and Distributed Processing
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC484" id="cmsc484"
            disabled="disabled"> 
            CMSC484 (3.00) Java Server Technologies
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC486" id="cmsc486"
            disabled="disabled"> 
            CMSC486 (3.00) Mobile Telephony Communications
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC487" id="cmsc487"
            disabled="disabled"> 
            CMSC487 (3.00) Introduction To Network Security
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC491" id="cmsc491"
            disabled="disabled"> 
            CMSC491 (3.00) Special Topics in Computer Science
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC493" id="cmsc493"
            disabled="disabled"> 
            CMSC493 (3.00) Capstone Games Group Project
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC495" id="cmsc495"
            disabled="disabled"> 
            CMSC495 (3.00) Honors Thesis
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC498" id="cmsc498"
            disabled="disabled"> 
            CMSC498 (3.00) Independent Study in Computer Science for Interns & Coop Students
            </label><br>

            <label>
            <input type="checkbox" name="classTaken[]" value="CMSC499" id="cmsc499"
            disabled="disabled"> 
            CMSC499 (1.00 - 4.00) Independent Study in Computer Science
            </label><br>
           
            <!-- This is the submit button -->
            <input class="submit" type="submit" name="submit" value="Submit"> 
        </form>
    </div>
  
    <!-- This footer is attached to the bottom of the page to state information such as copyright. It uses hexadecimal to display the copyright symbol -->
    <div id="footer">
    &#x000A9 2016 University of Maryland, Baltimore County | 1000 Hilltop Circle, Baltimore, MD 21250 | 410-455-1000
    </div>

    <script type="text/javascript" src="style2.js">
    </script>
</body>
</html>