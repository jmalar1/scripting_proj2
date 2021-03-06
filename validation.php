<?php
  if ($_SERVER['HTTP_REFERER'] == ""){
    header("location: index.php");
    die();
}
?>
<!-- 
     The above is a redirect to the main page.
     It's important because it prevents you from going straight
     to the validation page via the URL.
     

Description:
    This page will either display error messages based on incorrect input or it will show
    recommended classes you can register for if you input valid data.
-->
<!DOCTYPE html>


<html>
<title>UMBC | CMSC Advising</title>
<head>
    <!-- This is for the icon at the top of the page with the title -->
    <link rel="icon" href="icon.png">
    <!-- Link to the css file that stylizes the html in this document -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
  # SQL DATABASE INFO HERE!!!!!!!!!!!!!!!!!!!
  $dbhost = 'studentdb-maria.gl.umbc.edu';
  $dbuser = 'jmalar1';
  $dbpass = 'jmalar1';
  // usually same as the username if using gl database 
  $dbName = 'jmalar1';

  // Initialize variables to null.
  $IDErr = $nameErr = $emailErr = $phoneErr ="";
  $ID = $name = $email = $phone ="";
  $classTaken = array();
  $suggestClass = array();

  $ID = test_input($_POST["ID"]);
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $classTaken = $_POST['classTaken'];

  /* This function cleans off input by trimming, stripping off slashes, and removing the HTML special characters
   * to prevent insertion of unwanted code.
   */
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<!-- The "topTitle" div -->
<!-- Has one span in it to highlght the "UMBC" red in title -->
<div class = "topTitle">
<h1> <span style = "color:red"> UMBC </span> Advising for Computer Science Majors </h1> 
</div>

<!-- NAVIGATION BAR(LEFT-SIDE) with three things: Home, List of Classes, and About tab --> 
<!-- Currently it all the options link to the same html file -->
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active">Validation</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>

<!-- MAIN DIV -->
<!--The main div to put the form in, which will take in all the information--> 
<div class = "mainDiv">

<?php
  /* Generate a suggested class list based on the classes taken
   * if there are no generated errors
   */
    echo "<h3>Classes Taken:</h3>";
    $num = count($classTaken);
    if($num > 0) {
      sort($classTaken);
      for($i=0; $i < count($classTaken); $i++){
        echo($classTaken[$i] . " ");
      }

      //math courses
      if(!in_array("MATH151", $classTaken)){
        array_push($suggestClass, "MATH151");
      }else{
        if(!in_array("MATH152", $classTaken)){
      	  array_push($suggestClass, "MATH152");
        }else{
      	  if(!in_array("MATH221", $classTaken)){
      	    array_push($suggestClass, "MATH221");
          }
          if(!in_array("STAT355", $classTaken)){
            array_push($suggestClass, "STAT355");
          }
        }
      }
		
      //science courses
      if(!in_array("BIOL100", $classTaken) and !in_array("BIOL141", $classTaken) and !in_array("CHEM101", $classTaken) and !in_array("PHYS121", $classTaken)){
        array_push($suggestClass, "BIOL100");
        array_push($suggestClass, "BIOL141");
        array_push($suggestClass, "CHEM101");
        array_push($suggestClass, "PHYS121");
      }else{
        if(in_array("BIOL100", $classTaken) and !in_array("BIOL301", $classTaken)){
      	  if(!in_array("BIOL142", $classTaken))
      	    if(!in_array("CHEM102", $classTaken))
      	      if(!in_array("PHYS122", $classTaken))
		            array_push($suggestClass, "BIOL301");
      	}
      	if(in_array("BIOL141", $classTaken) and !in_array("BIOL142", $classTaken)){
      	  if(!in_array("BIOL301", $classTaken))
      	    if(!in_array("CHEM102", $classTaken))
      	      if(!in_array("PHYS122", $classTaken))
      	       	array_push($suggestClass, "BIOL142");
      	}
      	if(in_array("CHEM101", $classTaken) and !in_array("CHEM102", $classTaken)){
      	  if(!in_array("BIOL301", $classTaken))
      	    if(!in_array("BIOL142", $classTaken))
      	      if(!in_array("PHYS122", $classTaken))
      	       	array_push($suggestClass, "CHEM102");
      	}
      	if(in_array("PHYS121", $classTaken) and !in_array("PHYS122", $classTaken)){
      	  if(!in_array("BIOL301", $classTaken))
      	    if(!in_array("BIOL142", $classTaken))
      	      if(!in_array("CHEM101", $classTaken))
      		      array_push($suggestClass, "PHYS122");
      	}
      }

      //computer science courses
      if(!in_array("CMSC201", $classTaken)){
        array_push($suggestClass, "CMSC201");
      }else {
        if(!in_array("CMSC202", $classTaken)){
          array_push($suggestClass, "CMSC202");
        }else{
          if(!in_array("CMSC304", $classTaken)){
            array_push($suggestClass, "CMSC304");
          }
          if(!in_array("CMSC486", $classTaken)){
            array_push($suggestClass, "CMSC486");
          }
          if(!in_array("CMSC484", $classTaken)){
            array_push($suggestClass, "CMSC484");
          }
          if(!in_array("CMSC203", $classTaken)){
            array_push($suggestClass, "CMSC203");
          }else{
            if(!in_array("CMSC451", $classTaken)){
      	      array_push($suggestClass, "CMSC451");
      	    }
      	    if(!in_array("CMSC452", $classTaken)){
      	      array_push($suggestClass, "CMSC452");
      	    }
      	    if(!in_array("CMSC457", $classTaken)){
      	      array_push($suggestClass, "CMSC457");
      	    }
      	    if(!in_array("CMSC232", $classTaken)){
      	      array_push($suggestClass, "CMSC232");
      	    }
      	    if(!in_array("CMSC291", $classTaken)){
      	      array_push($suggestClass, "CMSC291");
      	    }
      	    if(!in_array("CMSC299", $classTaken)){
      	      array_push($suggestClass, "CMSC299");
      	    }
      	    if(!in_array("CMSC313", $classTaken)){
      	      array_push($suggestClass, "CMSC313");
      	    }else{
      	      array_push($suggestClass, "CMSC411");
      	    }
      	    if(!in_array("CMSC331", $classTaken)){
      	      array_push($suggestClass, "CMSC331");
      	    }else{
      	      if(!in_array("CMSC432", $classTaken)){
      	        array_push($suggestClass, "CMSC432");
      	      }
      	      if(!in_array("CMSC433", $classTaken)){
      	        array_push($suggestClass, "CMSC433");
      	      }
      	      if(!in_array("CMSC473", $classTaken)){
      	        array_push($suggestClass, "CMSC473");
      	      }
      	    }

      	    if(!in_array("CMSC341", $classTaken)){
      	      array_push($suggestClass, "CMSC341");
      	    }else{
      	      if(!in_array("CMSC427", $classTaken)){
      	        array_push($suggestClass, "CMSC427");
      	      }
      	      if(!in_array("CMSC436", $classTaken)){
      	        array_push($suggestClass, "CMSC436");
      	      }
      	      if(!in_array("CMSC437", $classTaken)){
      	        array_push($suggestClass, "CMSC437");
      	      }
      	      if(!in_array("CMSC443", $classTaken)){
      	        array_push($suggestClass, "CMSC443");
      	      }
      	      if(!in_array("CMSC453", $classTaken)){
      	        array_push($suggestClass, "CMSC453");
      	      }
      	      if(!in_array("CMSC455", $classTaken)){
      	        array_push($suggestClass, "CMSC455");
      	      }
      	      if(!in_array("CMSC456", $classTaken)){
      	        array_push($suggestClass, "CMSC456");
      	      }
      	      if(!in_array("CMSC461", $classTaken)){
      	        array_push($suggestClass, "CMSC461");
      	      }
      	      if(!in_array("CMSC352", $classTaken)){
      	        array_push($suggestClass, "CMSC352");
      	      }
      	      if(!in_array("CMSC391", $classTaken)){
      	        array_push($suggestClass, "CMSC391");
      	      }
      	      if(!in_array("CMSC404", $classTaken)){
      	        array_push($suggestClass, "CMSC404");
      	      }
      	      if(!in_array("CMSC444", $classTaken)){
      	        array_push($suggestClass, "CMSC444");
      	      }
      	      if(!in_array("CMSC446", $classTaken)){
      	        array_push($suggestClass, "CMSC446");
      	      }
      	      if(!in_array("CMSC495", $classTaken)){
      	        array_push($suggestClass, "CMSC495");
      	      }
      	      if(!in_array("CMSC498", $classTaken)){
      	        array_push($suggestClass, "CMSC498");
      	      }
      	      if(!in_array("CMSC499", $classTaken)){
      	        array_push($suggestClass, "CMSC499");
      	      }
      	      if(in_array("CMSC341", $classTaken) and in_array("STAT355", $classTaken)){
      	        array_push($suggestClass, "CMSC441");
      	      }
      	      if(!in_array("CMSC471", $classTaken)){
      	        array_push($suggestClass, "CMSC471");
      	      }else{
      	        if(!in_array("CMSC477", $classTaken)){
      	          array_push($suggestClass, "CMSC477");
      	        }
      	        if(!in_array("CMSC478", $classTaken)){
      	          array_push($suggestClass, "CMSC478");
      	        }
      	        if(!in_array("CMSC479", $classTaken)){
      	          array_push($suggestClass, "CMSC479");
      	        }
      	      }
      	      if(!in_array("CMSC475", $classTaken)){
      							array_push($suggestClass, "CMSC475");
      	      }
      	      if(!in_array("CMSC476", $classTaken)){
      							array_push($suggestClass, "CMSC476");
      	      }
      	      if(!in_array("CMSC481", $classTaken)){
      							array_push($suggestClass, "CMSC481");
      	      }
      	      if(in_array("CMSC461", $classTaken) and in_array("CMSC481", $classTaken)){
      	        if(!in_array("CMSC465", $classTaken) or !in_array("CMSC466", $classTaken)){
      	          if(!in_array("CMSC465", $classTaken) and !in_array("CMSC466", $classTaken)){
      	            array_push($suggestClass, "CMSC465");
      	            array_push($suggestClass, "CMSC466");
      	          }
      	        }
      	      }
      	      $filtered = 0;
      	      foreach ($classTaken as $element) {
      	        if (preg_match("@^CMSC4@",$element)){ 
      	          $filtered = 1;
      	        }
      	      }
      	      if($filtered == 1){
      	        if(!in_array("CMSC447", $classTaken)){
      	          array_push($suggestClass, "CMSC447");
      	        }else{
      	          if(!in_array("CMSC448", $classTaken)){
      	            array_push($suggestClass, "CMSC448");
      	          }
      	        }
      	      }
        	    if(in_array("CMSC313", $classTaken) and in_array("CMSC341", $classTaken)){
        	      if(!in_array("CMSC421", $classTaken)){
        	        array_push($suggestClass, "CMSC421");
        	      }else{
        	        if(!in_array("CMSC426", $classTaken)){
        	          array_push($suggestClass, "CMSC426");
        	        }
        	        if(!in_array("CMSC483", $classTaken)){
        	          array_push($suggestClass, "CMSC483");
        	        }
        	      }
        	      if(in_array("CMSC421", $classTaken) and in_array("CMSC481", $classTaken)){
        	        if(!in_array("CMSC487", $classTaken)){
        	          array_push($suggestClass, "CMSC487");
        	        }
        	      }
        	      if(!in_array("CMSC435", $classTaken)){
        	        array_push($suggestClass, "CMSC435");
        	      }else{
        	        if(in_array("CMSC435", $classTaken) and in_array("CMSC471", $classTaken)){
        	          if(!in_array("CMSC493", $classTaken)){
        	            array_push($suggestClass, "CMSC493");
        	          }
        	        }
                }
              }
        	    if(in_array("CMSC331", $classTaken) and in_array("CMSC341", $classTaken)){
        	      if(!in_array("CMSC431", $classTaken)){
        	        array_push($suggestClass, "CMSC431");
        	      }
              }
            }
          }
        }
      }
    }else{
      array_push($suggestClass, "CMSC201");
      array_push($suggestClass, "MATH151");
      array_push($suggestClass, "BIOL100");
      array_push($suggestClass, "BIOL141");
      array_push($suggestClass, "CHEM101");
      array_push($suggestClass, "PHYS121");
      echo "You haven't taken any class<br>\n";
    }
    echo "<h3>Suggested Classes:</h3><span id=\"suggested\">";
    sort($suggestClass);
    for($i=0; $i < count($suggestClass); $i++){
      echo($suggestClass[$i] . " ");
    }
    echo "</span><br><br>";
?>

<!-- if all input are valid, then push student info and classes taken info into database -->
<?php 
  # SQL CODE HERE TO INSERT STUDENT INFORMATION IN THE TABLES
  # THE TABLE NAME IS STUDENTS 
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  mysql_select_db($dbName, $conn);
  if(! $conn ){
    die('Could not connect: ' . mysql_error());
  }
  // on duplicate to make sure no warnings or errprs are generated for 
  // duplicated key 
  $sql = "INSERT INTO `Students` (`student_id`, `student_name`, `student_email`, `student_phone`) VALUES ('$ID', '$name', '$email', '$phone') ON DUPLICATE KEY UPDATE student_name=student_name, student_email=student_email, student_phone=student_phone;";
  $retval = mysql_query( $sql, $conn );
  if(! $retval){
    die('Could not insert data: ' . mysql_error());
  }

  # SQL code to insert the classes previously selected
  // if statement to avoid warning if its empty 
  if(count($classTaken)){
    // insert each class
    foreach($classTaken as $data){
      //'P' means the class is taken in the table
      $sql = "INSERT INTO `course_taken` (`student_id`, `course_id`, `completed`) VALUES ('$ID', '$data', 'P') ON DUPLICATE KEY UPDATE student_id=student_id, course_id=course_id;";
      $retval = mysql_query( $sql, $conn );
      if(! $retval ){
        die('Could not insert data: ' . mysql_error());
      }
    }
  
  // close connection
  mysql_close($conn);
?>

  <!-- This collects the registration class data via text input --> 
  <form method="post" action="register.php" onsubmit="return checkClasses()">
    <h2>Please enter the classes you want to register:</h2>
    <input type='hidden' name="suggestClass" value="<?php echo htmlentities(serialize($suggestClass)); ?>" >
    Student ID:<br> 
    <input type="text" name="ID" value="<?php echo htmlspecialchars($ID); ?>" readonly>
    <br>
    Name:<br> 
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" readonly>
    <br>
    E-mail:<br> 
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" readonly>
    <br>
    Phone:<br>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" readonly>
    <br><br>
    <p>Enter the class ID only, example: CMSC201<p><br>
    Class one:<br> 
    <input type="text" name="class1" class="newRegister"><span id="class1"></span>
    <br>
    Class two:<br> 
    <input type="text" name="class2" class="newRegister"><span id="class2"></span>
    <br>
    Class three:<br> 
    <input type="text" name="class3" class="newRegister"><span id="class3"></span>
    <br>
    Class four:<br> 
    <input type="text" name="class4" class="newRegister"><span id="class4"></span>
    <br>
    Class five:<br> 
    <input type="text" name="class5" class="newRegister"><span id="class5"></span>
    <br>
    <input class="submit" type="submit" name="submit" value="Submit"> 
	 
  </form>

<?php  } 	

// Print error message for incorrect input
else {
  echo "<br>\n<b>Please fill out the required information in order to register.</b><br><br>\n";
?>
  <form><input Type="button" value="Back" onClick="history.go(-1);return true;"></form>
<?php }
?>

</div>

<div id="footer">
  &#x000A9 2016 University of Maryland, Baltimore County | 1000 Hilltop Circle, Baltimore, MD 21250 | 410-455-1000
</div>

<script type="text/javascript">
	function checkClasses(){
		var suggested = document.getElementById("suggested").innerHTML;
		var classes = document.getElementsByClassName("newRegister");
		var accept = true;
		for(var i = 0; i < 5; i++){
			var text = classes[i].value;
			var err = document.getElementById(classes[i].name);
			if(text !== "" && !(suggested.includes(" " + text + " "))){
				err.innerHTML = "You cannot register for this class";
				accept = false;
			}else{
				err.innerHTML = "";
			}
		}
		if(!accept){
			return false;
		}
	}
</script>
</body>
</html>
