<?php
    if ($_SERVER['HTTP_REFERER'] == ""){
        header("location: index.php"); // This has to go before any whitespace in HTML to work
        die(); // This allows for the redirect to happen
    }
    
?>

<!-- 
     The above is a redirect to the main page.
     It's important because it prevents you from going straight
     to the validation page via the URL.
     

Description:
    This page is the confirmation page that will tell you if the data has been inserted into the
    database successfully. It also tells you the possible errors in input you have made.
    If the data is valid, you will be shown the classes you registered for in the session.
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
  // Initialize all variables to null.
  $ID = $name = $email = $phone ="";
  $classErr = array(); //  Array of error messages
  $class = array();
  $validClass = array();

  # SQL INFO from Neh's database
  $dbhost = 'studentdb-maria.gl.umbc.edu';
  $dbuser = 'jmalar1';
  $dbpass = 'jmalar1';
  $dbName = 'jmalar1';
   
   // Collect the user input and validate it
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ID = test_input($_POST["ID"]);
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $validClass = unserialize($_POST["suggestClass"]);
	
    // Input for the first class registration
    if (empty($_POST["class1"])) {
      //do nothing
    } else {
      $class[0] = test_input($_POST["class1"]);
      if (!preg_match("/^[A-Z]{4}\d{3}$/",$class[0])) {
        $classErr[0] = "Error: Invalid class ID format<br>";
      } 
      if(!in_array($class[0], $validClass)){
        $classErr[0].= "Error: This class is not available for you, please pick a suggested class<br>";

      }
    }

    // Input for the second class registration
    if (empty($_POST["class2"])) {
       //do nothing
    } else {
      $class[1] = test_input($_POST["class2"]);
      if (!preg_match("/^[A-Z]{4}\d{3}$/",$class[1])) {
        $classErr[1] = "Error: Invalid class ID format<br>";
      } 
      if(!in_array($class[1], $validClass)){
        $classErr[1].= "Error: This class is not available for you, please pick a suggested class<br>";

      }
    }
    
    // Input for the third class registration
    if (empty($_POST["class3"])) {
       //do nothing
    } else {
      $class[2] = test_input($_POST["class3"]);
      if (!preg_match("/^[A-Z]{4}\d{3}$/",$class[2])) {
        $classErr[2] = "Error: Invalid class ID format<br>";
      } 
      if(!in_array($class[2], $validClass)){
        $classErr[2].= "Error: This class is not available for you, please pick a suggested class<br>";

      }
    }
    
    // Input for the first class registration
    if (empty($_POST["class4"])) {
       //do nothing	
    } else {
      $class[3] = test_input($_POST["class4"]);
      if (!preg_match("/^[A-Z]{4}\d{3}$/",$class[3])) {
        $classErr[3] = "Error: Invalid class ID format<br>";
      }
      if(!in_array($class[3], $validClass)){
        $classErr[3].= "Error: This class is not available for you, please pick a suggested class<br>";

      }
    }
    
    // Input for the fifth class registration
    if (empty($_POST["class5"])) {
       //do nothing	
    } else {
      $class[4] = test_input($_POST["class5"]);
      if (!preg_match("/^[A-Z]{4}\d{3}$/",$class[4])) {
        $classErr[4] = "Error: Invalid class ID format<br>";
      }	
      if(!in_array($class[4], $validClass)){
        $classErr[4].= "Error: This class is not available for you, please pick a suggested class<br>";

      }
    }


}

// This function cleans off input by trimming, stripping off slashes, and removing the HTML special characters
// to prevent insertion of unwanted code.
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
  <li><a class="active">Confirmation</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>

<!-- MAIN DIV -->
<!--The main div to put the form in, which will take in all the information--> 
<div class = "mainDiv">

<?php
  $Color = "red"; // color for displaying error message
  echo "<h2>Personal Information:</h2>";
  echo "Student ID: ". $ID."<br><br>\n";
  echo "Name: ". $name."<br><br>\n";
  echo "Email: ". $email."<br><br>\n";
  echo "Phone Number: ". $phone."<br><br>\n";

  echo "<h2>Class Registered Information:</h2>";
  $arrlength = count($class);
  
  
  if($arrlength == 0) {
    echo "You didn't register any class, please fill in the class you want to take.<br><br>\n";
?>
    <form><input Type="button" value="Back" onClick="history.go(-1);return true;"></form>
<?php } else {
    $count = 0;
    foreach($class as $data){
      $count += 1;
      echo "Class Input ". $count." : " . $data;
      $x = array_search($data, $class);
      echo '<p style="Color:'.$Color.'">'.$classErr[$x].'</p>';

      //check if duplicate class in the input, display error message if yes
      foreach(array_count_values($class) as $val => $c){
        if($val == $data)
          if($c > 1){
            $classErr[5] = "ERROR"; 
            echo '<p margin:0 style="Color:'.$Color.'">'."Error: same class repeated, please try another class".'</p>';
          }
      }
      echo "<br>\n";
    }
  }

  if(empty($classErr) and !empty($class)) {
    # SQL CODE HERE TO INSERT THE NEW CLASSES INTO THE DATABASE 
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    if(! $conn ){
	  die('Could not connect: ' . mysql_error());
    }
    # the for loop iterates the array and inserts each class in DB
    # if to avoid warning on empty array 
    if(count($class)){
      foreach($class as $data){
        $sql = "INSERT INTO `course_taken` (`student_id`, `course_id`, `completed`) VALUES ('$ID', '$data', 'R') ON DUPLICATE KEY UPDATE student_id=student_id;";
        mysql_select_db($dbName);
        $retval = mysql_query( $sql, $conn );
        if(! $retval ){
          die('Could not insert data: ' . mysql_error());
        }
      }
    }
    // close connection 
    mysql_close($conn);
    echo "<b>You have successfully registered above classes, and the data is stored in the database.</b><br><br>\n"; 

?>
    <a class="return" href="index.php">Return to Homepage</a>
<?php }elseif(!empty($classErr)) {
  echo "<b>Please follow the error message to edit your input classes in order to register.</b><br><br>\n"; ?>
  <form><input Type="button" value="Back" onClick="history.go(-1);return true;"></form>
<?php }

?>

</div>



</body>
<div id="footer">
  &#x000A9 2016 University of Maryland, Baltimore County | 1000 Hilltop Circle, Baltimore, MD 21250 | 410-455-1000
</div>
</html>
