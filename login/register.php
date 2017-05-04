
<html>
  <head>
  <title>Sign-Up</title>
  </head>
  <body id="body-color"> <div id="Sign-Up"> 
  <fieldset style="width:30%"><legend>Registration Form</legend> 
  <table border="0">
  <tr>
  <form method="POST" action="login/sign-up.php">
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


