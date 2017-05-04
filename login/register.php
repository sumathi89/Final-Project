<?php
include 'database.php';
if ( isset($_POST['signup']) ) {
 // clean user inputs to prevent sql injections
 $name = trim($_POST['name']);
 $name = strip_tags($name);
 $name = htmlspecialchars($name);
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // basic name validation
 if (empty($name)) {
 $error = true;
 $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
 $error = true;
 $nameError = "Name must have atleat 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
 $error = true;
 $nameError = "Name must contain alphabets and space.";
 }
 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
 $error = true;
 $emailError = "Please enter valid email address.";
 } else {
  // check email exist or not
  $query = "SELECT Email FROM store_login WHERE Email='$email'";
  $result = mysql_query($query);
  $count = mysql_num_rows($result);
  if($count!=0){
  $error = true;
  $emailError = "Provided Email is already in use.";
  }
  }
  // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
  }
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  // if there's no error, continue to signup
  if( !$error ) {
  $query = "INSERT INTO store_login(userName,userEmail,userPass)
  VALUES('$name','$email','$password')";
  $res = mysql_query($query);
  if ($res) {
  $errTyp = "success";
  $errMSG = "Successfully registered, you may login now";
  unset($name);
  unset($email);
  unset($pass);
  } else {
  $errTyp = "danger";
  $errMSG = "Something went wrong, try again later..."; 
  } 
  }
  }
  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
  <title>Sign-Up</title>
  </head>
  <body id="body-color"> <div id="Sign-Up"> 
  <fieldset style="width:30%"><legend>Registration Form</legend> 
  <table border="0">
  <tr>
  <form method="POST" action="sign-up.php">
  <td>Name</td>
  <td>
  <input type="text" name="name"></td> </tr>
  <tr> <td>First Name</td><td> <input  type="text" name="fname"></td> </tr>
  <tr> <td>Lastname</td><td> <input  type="text" name="lname"></td> </tr>
  <tr> <td>Email</td><td> <input  type="text" name="email"></td> </tr>
  <tr> <td>Username</td><td><input type="text" name="uname"></td></tr>
  <tr> <td>Password</td><td><input type="password" name="pass"></td></tr>
  <tr> <td>Confirm Password</td><td><input type="password" name="cpass"></td> </tr> 
  <tr> <td>Gender</td><td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="female">Female</td>
  <td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male </td></tr>
  <tr> <td><input  id="button" type="submit" name="submit" value="Sign-Up"></td> </tr> 
  </form>  
  </table> 
  </fieldset> 
  </div> 
  </body> 
  </html>


