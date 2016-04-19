Authors:


Project Description£º
  Create pages which will allow a student to enter their currently taken CMSC courses,
  display what they can take next semester, and save the results.

Video link: https://youtu.be/i1z4VCUi62Y

This project contains:
index.html
contact.html
index.php
validation.php
register.php
style.css
icon.png
README.txt
VIDEO.txt

README.txt is documentation for the project.
VIDEO.txt will contain the url to the project video.

Validation Notes:
- First Form:
    The first form in the index.php will collect students' personal information and their classes taken information.
  Student ID, Name, Email, and Phone Number are required input for users, and classes taken (checkboxes) are optional 
  for users.
    After users click on the submit button at the bottom of the page, it will direct them into validation.php. If any 
  required inputs from first form is empty, error message will display corresponding to that empty input. If all 
  required inputs are not empty, the inputs will be validated and it will display the validation result. If any input is invalid, 
  for example, incorrect student ID format, error message will display and indicate users to correct their input. Users have
  to go back to the previous page and correct their inputs until all of them are valid in order to see the suggested classes
  list and register class.

- Second Form:
    When the required inputs from first form are all valid, the classes taken and suggested classes lists will display
  in the validation.php, and the users' personal info and classes taken info (if any) will be sent to the database. In addition, 
  the second form will appear, and it will contain the personal information that users entered from first form in the read only 
  format and a list of text fields for users to type in any class ID they want to take next semester. Even though the classes 
  taken is empty (it is optional for first form), the suggested classes will be generated because there are some classes without
  prerequisites. In addition, if users input fake classes taken information, the suggested list will ignore it and generate the 
  correct class list. For example, if users input CMSC304 without taking the prequisities like CMSC201, the suggested classes list 
  will suggest CMSC201 instead of the class which has higher level than CMSC304. Based on the suggested classes list, users can 
  input classes and submit the second form.
    There are five text fields for input in second form, and users can enter class ID on any text field they want to register. 
  After submit the second form, it will direct users into register.php. If all inputs are empty, error message will display and 
  ask users to reenter class ID from previous page. If any input is not empty, the input data will be validated and it will 
  display the validation result. If the input class ID format is invalid, error message will display. If the input class ID is 
  not in the suggested classes list which means certain class is not available for the users based on their classes taken info, 
  error message will display. If there are any duplicated class ID inputs, error message will display. There might be multiple 
  error messages depending on the users inputs. After all class ID inputs are valid, the registered class ID info will be sent 
  to the database.

- Database:
    There are three tables in the database: Students, Courses, and course_taken. The Student table will store the personal 
  information that users submit from the first form. The Courses table will store all the available classes ID and classes name, 
  so if the input class ID is not in this table, then this class will not be allowed to register. The course_taken table will 
  store studen ID, classes taken and registered classes information. This table contain a completed column which will show
  taken class along with "P" (Pass) and registered class along with "R" (Registered) for a student ID.
    After the second form is completed, and registered class ID info is sent to the database. The Students table will now 
  contain user's Student ID, Name, Email, and Phone Number. The course_taken table will now contain user's taken classes and 
  registered classes info. We will use student ID column in this table to identify user, and use completed column to classify 
  which class is already taken, and which class is just registered.  



Database(DB) Notes:
- Database Host used: studentdb-maria.gl.umbc.edu
- So the DB code only works on GL, or only for PHP version 4

- Two files need to be editded for the data to be inserted in the DB:
  - validation.php 
  - regiester.php
    - Need to enter the username, password, and database name for the database that will be used. 
    - The vairiables names are as follow:
        - $dbhost = 'studentdb-maria.gl.umbc.edu'; // this was the database used by us 
        - $dbuser = 'userName';
        - $dbpass = 'password';
        - $dbName = 'dbName';
    - The variables are all the way at the top of the php portion of the files

    To look at the structure or use the database that has already been created contact authors 
    of the project 

- DB Tables needed for correct insertion and updates. 
- MAKE SURE IT IS THE EXACT SAME FORMAT 
  - Students:
    - student_ID (PRIMARY)    - varchar(10)
    - student_name            - text
    - student_email           - text
    - student_phone           - text
  - Courses:
    - course_ID (PRIMARY)     - varchar(10)
    - course_name (NULL)      - text
    - course_credits (NULL)   - text
  - course_taken (table is a relation between students and courses)
    - student_id (PRIMARY)   - varchar(10)
    - course_id (PRIMARY)    -  varchar(10)
    - complete (NULL)        -  varchar (5) 
        - This is to distiniguish courses:
            - finished ('P')
            - registering for ('R')
    - then go to Structure -> Relation View ( Next to Print View) 
    - Select 'dbName'.'Students'.'student_id' for first drop-down
    - Select 'dbName'.'Courses'.'course_id' for second drop-down
    - Leave constraints empty and everything else as it is provided
    - Save the relation 
    
    Now comes the tedious work. Since the course_taken table is a relational table it needs pre-existential 
    keys in courses and students. Students is fine since it validates before moving forward. However, 
    a course list in the courses table is needed. If nothing is in there than the code will not work. 
    So you must insert all the classes in it. Sorry to make you do this, but this is makes the db less redudant 
    and easier to manipulate and understand. Format for course_id key is also critical, since it must 
    match what the browser sends it. So for Computer Science I, you would have 'CMSC201'. You may make the
    course name attribute a NULL value so you dont have to input the name for the moment if you dont want to. 
    Have fun with it. 
    
    Note:
        When making the $sql variable in the php code for insertion; if the code throws an error go to 
        the Insert tab in the table, and insert random data. If successful, it will generate a query for you.
        Just replace this query in the $sql variable and the code should work. For some reason it doesnt work 
        if you type it in(very case-sensitive, i guess). Copy and past has workd for the authors for almost every 
                  insert sql variable. 




