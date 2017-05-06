<?php
include '../model/database.php';
include '../model/db_functions.php';

if ( isset($_POST['signup']) ) {
 // clean user inputs to prevent sql injections
 $fname = trim($_POST['fname']);
 $fname = strip_tags($fname);
 $fname = htmlspecialchars($fname);

 $lname = trim($_POST['lname']);
 $lname = strip_tags($lname);
 $lname = htmlspecialchars($lname);

 $uname = trim($_POST['uname']);
 $uname = strip_tags($uname);
 $uname = htmlspecialchars($uname);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 
 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

 $cpass = trim($_POST['cpass']);
 $cpass = strip_tags($cpass);
 $cpass = htmlspecialchars($cpass);

 $phone= trim($_POST['phone']);
 $phone=strip_tags($phone);
 $phone=htmlspecialchars($phone);

 $gender= trim($_POST['gender']);
 $gender=strip_tags($gender);
 $gender=htmlspecialchars($gender);

  // basic name validation
  if (empty($fname)) {
  $error = true;
  $fnameError = "Please enter your first name.";
  } else if (strlen($fname) < 3) {
  $error = true;
  $fnameError = "Name must have atleat 3 characters.";
 }else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
 $error = true;
 $fnameError = "Name must contain alphabetse.";
 }
 if (empty($lname))
 {
 $error=true;
 $lnameError="Please enter your last name.";
 }
 else if(!preg_match("/^[a-zA-Z ]+$/",$lname))
 {
 $error=true;
 $lnameError="Name must contain alphabets.";
 }

//basic phone number validation
if (empty($phone))
{
$error=true;
$phoneError="Please enter the phone number.";
}
else if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
{
$error=true;
$phoneError="Phone No. must contain only numbers.";
}


//basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
 $error = true;
 $emailError = "Please enter valid email address.";
 } else {
// check email exist or not
 $query = "SELECT username FROM store_login WHERE username='$email'";
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

if (empty($cpass))
{
$error=true;
$cpassError="Please enter password.";
if ($pass!=$cpass)
{
$error=true;
$cpassError="Password entered doesn't match.Please try again. ";
}
}
 

  // if there's no error, continue to signup
if( !$error ) {
	
     $result=  createNewAccount($fname,$lname,$phone,$email,$pass,$gender);
      if ($result) {
      $errTyp = "success";
      unset($fname);
      unset($lname);
      unset($uname);
      unset($email);
      unset($pass);
      unset($cpass);
   } else {
$errTyp = "danger";
$errMSG = "Something went wrong, try again later..."; 
}
}
}
?>
<html>
<head>
<title>Sign-Up</title>
</head>
<body id="body-color"> <div id="Sign-Up"> 

<fieldset style="width:75%" align ="center"><legend>Registration Form</legend> 
<table border="0" align="center">
<tr>
<form method="POST" action="">
<tr> <td>First Name</td><td> <input  type="text" name="fname"></td><td><?php echo $fnameError; ?> </td></tr>
<tr> <td>Lastname</td><td> <input  type="text" name="lname"></td><td><?php echo $lnameError; ?> </td> </tr>
<tr> <td>Phone Number</td><td><input type="text" name="phone"></td><td><?php echo $phoneError; ?> </td> </tr>
<tr> <td>Gender</td><td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male </td></tr>
<tr><td>Date of Birth</td><td><select name="year" id="year" class="form-control">
<option value="--" selected>Year</option>                       
<?php
for($i=date('Y'); $i>1899; $i--) {
$birthdayYear = '';
$selected = '';
if ($birthdayYear == $i) $selected = ' selected="selected"';
print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
}
?>                          
</select>
<select name="month" id="month" onchange="" class="form-control" size="1">
<option value="--" selected>Month</option>
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
<select name="day" id="day" onchange="" class="form-control" size="1">
<option value="--" selected>Day</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
</tr>
<tr> <td>Email</td><td> <input  type="text" name="email"></td><td><?php echo $emailError; ?> </td> </tr>
<tr> <td>Password</td><td><input type="password" name="pass"></td><td><?php echo $passError; ?> </td></td></tr>
<tr> <td>Confirm Password</td><td><input type="password" name="cpass"></td><td><?php echo $cpassError; ?> </td> </tr>
<tr> <td><input  id="button" type="submit" name="signup" value="Sign-up"></td> </tr> 
</form>  
</table> 
</fieldset>
</div>
<?php if ($errTyp=="success"){ 
 header("Location:../view/reg_Success.php");
}?>
</body>
</html>
