<?php
include 'database.php';
if ( isset($_POST['signup']) ) {
 // clean user inputs to prevent sql injections
 $fname = trim($_POST['fname']);
 $fname = strip_tags($fname);
 $fname = htmlspecialchars($fname);

 $lname = trim($_POST['lname']);
 $lname = strip_tags($lname);
 $lname = htmlspecialchars($lname);

 $uname = trim($_POST['uname']);
 $uname = strip_tags($uanme);
 $uname = htmlspecialchars($uname);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 
 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
  // basic name validation
  if (empty($fname)) {
  $error = true;
  $nameError = "Please enter your first name.";
  } else if (strlen($fname) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
 }else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
 $error = true;
 $nameError = "Name must contain alphabetse.";
 }
 if (empty($lname))
 {
 $error=true;
 $lnameError="Please enter your last name.";
 }
 else if(!preg_match("/^[a-zA-Z ]+$/",$lname))
 {
 $error=true;
 $nameError="Name must contain alphabets.";
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
      $query = "INSERT INTO store_login(userName,userEmail,userPass)  VALUES('$name','$email','$password')";
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
} ?>

